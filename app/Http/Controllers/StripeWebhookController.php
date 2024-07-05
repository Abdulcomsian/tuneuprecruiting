<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrialWillEndNotification;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $event = json_decode($payload, true);
        if (json_last_error() !== JSON_ERROR_NONE || !isset($event['type'])) {
            return response()->json(['status' => 'invalid payload'], 400);
        }

        $eventType = $event['type'];
        switch ($eventType) {
            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($event);
                break;

            case 'invoice.payment_failed':
                $this->handleInvoicePaymentFailed($event);
                break;

            case 'customer.subscription.trial_will_end':
                $this->handleTrialWillEnd($event);
                break;

            default:
                Log::info('Received unknown event type ' . $eventType);
                return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'success'], 200);
    }

    protected function handleInvoicePaymentSucceeded($payload)
    {
        $invoice = $payload['data']['object'];
        $subscriptionId = $invoice['subscription'];
        $subscription = Subscription::where('stripe_id', $subscriptionId)->first();

        if (!$subscription) {
            Log::error('Subscription not found for stripe_id: ' . $subscriptionId);
            return;
        }

        $planId = $subscription->plan_id;
        $plan = Plan::find($planId);

        if (!$plan) {
            Log::error('Plan not found for plan_id: ' . $planId);
            return;
        }

        if ($plan->slug == 'essential-monthly') {
            $endsAt = now()->addMonth();
        } else {
            $endsAt = now()->addYear();
        }

        $subscription->stripe_status = 'paid';
        $subscription->ends_at = $endsAt;
        $subscription->save();

        Log::info('Invoice payment succeeded: ' . $subscriptionId);
    }


    protected function handleInvoicePaymentFailed($payload)
    {
        $invoice = $payload['data']['object'];
        $subscriptionId = $invoice['subscription'];
        $subscription = Subscription::where('stripe_id', $subscriptionId)->first();

        if ($subscription) {
            $subscription->stripe_status = 'past_due';
            $subscription->save();
        }

        Log::info('Invoice payment failed: ' . $subscriptionId);
    }

    protected function handleTrialWillEnd($payload)
    {
        $invoice = $payload['data']['object'];
        $subscriptionId = $invoice['subscription'];
        $subscription = Subscription::where('stripe_id', $subscriptionId)->first();
        $user = User::findOrFail($subscription->user_id);
        if ($user) {
            try {
                Mail::to($user->email)->send(new TrialWillEndNotification($user));

                Log::info('Trial will end email sent to user: ' . $user->id);
            } catch (\Exception $e) {
                Log::error('Failed to send trial end notification email: ' . $e->getMessage());
            }
        }
    }
}
