<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use App\Models\User;
use Laravel\Cashier\Subscription;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $eventType = $payload['type'];

        // Handle the event
        switch ($eventType) {
            case 'invoice.payment_succeeded':
                $this->handleInvoicePaymentSucceeded($payload);
                break;

            case 'invoice.payment_failed':
                $this->handleInvoicePaymentFailed($payload);
                break;

            case 'customer.subscription.trial_will_end':
                $this->handleTrialWillEnd($payload);
                break;

            default:
                // Unexpected event type
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

        if ($subscription) {
            $subscription->stripe_status = 'active';
            $subscription->save();
        }

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
        $subscription = $payload['data']['object'];
        $user = User::where('stripe_id', $subscription['customer'])->first();

        if ($user) {
            // Send an email to remind the user
            // Example: Mail::to($user)->send(new TrialWillEndNotification($user));
            Log::info('Trial will end for user: ' . $user->id);
        }
    }
}
