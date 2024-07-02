<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Laravel\Cashier\Subscription;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::whereIn('slug', ['basic', 'premium'])->get();
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


    public function success(Request $request)
    {
        try {
            $sessionId = $request->session_id;
            if (isset($sessionId)) {
                $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
                $checkout_session = $stripe->checkout->sessions->retrieve($sessionId, []);
                $user_email = $checkout_session->customer_details->email;
                $userData = User::where("email", $user_email)->first();
                $stripePrice = number_format($checkout_session->amount_total / 100, 2);
                $price_id = $checkout_session->metadata->price_id;
                $priceId = $checkout_session->metadata->price_id;
                $plan = Plan::where("stripe_plan", $priceId)->first();
                if ($plan->slug == "basic") {
                    $expirationDate = Carbon::now()->addMonth();
                } elseif ($plan->slug == "premium") {
                    $expirationDate = Carbon::now()->addYear();
                }

                Subscription::create([
                    "user_id" => $userData->id,
                    "type" => $checkout_session->mode,
                    "stripe_id" =>  $checkout_session->id,
                    "stripe_status" => $checkout_session->payment_status,
                    "stripe_price" => $stripePrice,
                    "quantity" => 1,
                    "trial_ends_at" => $expirationDate,
                    "ends_at" => $expirationDate
                ]);
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
