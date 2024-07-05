<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Plan;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Redis;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->get();
        return view("payment.plans", compact("plans"));
    }

    public function show(Plan $plan, Request $request)
    {
        return view("payment.subscription", compact("plan"));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
            ->create($request->token);
        return view("payment.subscription_success");
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $plan = Plan::findOrfail($request->plan_id);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $plan->stripe_plan,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            "metadata" => [
                "price_id" => $plan->stripe_plan
            ],
            'cancel_url' => route('checkout.cancel'),
        ]);
        return redirect($session->url);
    }

    public function onetimePay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $plan = Plan::findOrfail($request->plan_id);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $plan->stripe_plan,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            "metadata" => [
                "price_id" => $plan->stripe_plan
            ],
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }


    public function success(Request $request)
    {
        try {
            $sessionId = $request->session_id;
            if (isset($sessionId)) {
                $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
                $checkout_session = $stripe->checkout->sessions->retrieve($sessionId, []);
                $user_email = $checkout_session->customer_details->email;
                $userData = User::where("email", $user_email)->first();

                if ($checkout_session->mode === 'subscription') {
                    $subscriptionId = $checkout_session->subscription;
                    $stripePrice = number_format($checkout_session->amount_total / 100, 2);
                    $priceId = $checkout_session->metadata->price_id;
                    $plan = Plan::where("stripe_plan", $priceId)->first();

                    if ($plan->slug == "essential-monthly") {
                        $expirationDate = Carbon::now()->addMonth();
                    } elseif ($plan->slug == "essential-yearly") {
                        $expirationDate = Carbon::now()->addYear();
                    } else {
                        $expirationDate = Carbon::now()->addDay();
                    }

                    Subscription::create([
                        "user_id" => $userData->id,
                        "type" => $checkout_session->mode,
                        "stripe_id" => $subscriptionId,
                        "stripe_status" => $checkout_session->payment_status,
                        "plan_id" => $plan->id,
                        "stripe_price" => $stripePrice,
                        "quantity" => 1,
                        "trial_ends_at" => $expirationDate,
                        "ends_at" => $expirationDate
                    ]);
                } elseif ($checkout_session->mode === 'payment') {
                    $paymentIntentId = $checkout_session->payment_intent;
                    $stripePrice = number_format($checkout_session->amount_total / 100, 2);
                    $priceId = $checkout_session->metadata->price_id;

                    Payment::create([
                        "user_id" => $userData->id,
                        "stripe_id" => $paymentIntentId,
                        "stripe_status" => $checkout_session->payment_status,
                        "amount" => $stripePrice,
                        "payment_method" => 'card',
                        "quantity" => 1,
                        "ends_at" => Carbon::now()->addYear(),
                    ]);
                }

                return redirect()->route('login', ['user' => 'student']);
            } else {
                return response()->json(["success" => false, "msg" => "Unauthorized User", "status" => 401], 401);
            }
        } catch (\Exception $e) {
            return response()->json(["success" => false, "msg" => "Something went wrong", "error" => $e->getMessage(), "line" => $e->getLine(), "status" => 400], 400);
        }
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
