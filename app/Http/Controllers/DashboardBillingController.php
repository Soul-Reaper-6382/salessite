<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Subscription_Item;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class DashboardBillingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function billing_history_view()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripeCustomer = null;
        $subscription = null;
        $invoices = [];

        if (Auth::user()->stripe_id) {
            // Retrieve customer from Stripe
            $stripeCustomer = $stripe->customers->retrieve(Auth::user()->stripe_id, []);
             // Retrieve subscription details
            $subscriptions = $stripe->subscriptions->all([
                'customer' => $stripeCustomer->id,
            ]);
            // Retrieve all invoices for the customer
            $invoices = $stripe->invoices->all([
                'customer' => $stripeCustomer->id,
                'limit' => 10, // Adjust the limit as needed
            ]);

            $subscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
        

        $planStatus = $subscription ? $subscription->status : 'Trial';
        $billingInterval = $subscription ? $subscription->items->data[0]->plan->interval : 'N/A';
        $nextBillingDate = $subscription ? \Carbon\Carbon::createFromTimestamp($subscription->current_period_end) : null;
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        $plan_get_name = getPlanByPriceId($priceId);

        return view('billing_history', [
            'stripeCustomer' => $stripeCustomer,
            'invoices' => $invoices->data,
            'planStatus' => $planStatus,
            'planName' => $plan_get_name->name,
            'billingInterval' => $billingInterval,
            'nextBillingDate' => $nextBillingDate,
            'priceId' => $priceId
        ]);
        }
        else{
            return view('billing_history');
        }
    }
    
    

}
