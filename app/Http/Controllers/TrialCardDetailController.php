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


class TrialCardDetailController extends Controller
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

    
    public function card_details()
    {
        return view('card_details');
    }

    public function update_card_detail(Request $request)
    {
        $user = Auth::user();
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

        $plan = getUserPlanDetails($user->plan_id);

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripeCustomer = $stripe->customers->create([
            'payment_method' => $request->token,
            'name' => $user->fname.' '.$user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
             'invoice_settings' => [
                    'default_payment_method' => $request->token
                  ]
        ]);
   //      // dd($stripeCustomer);
           $subscription =  $stripe->subscriptions->create([
          'customer' => $stripeCustomer->id,
          'items' => [
            ['price' => $plan->stripe_plan],
          ],
          'trial_period_days' => 60, // Set a 60-day trial
        ]);
    // user db
        $user_stripe_id = $subscription->customer;
        $subscription_stripe_id = $subscription->id;
        $stripe_status = $subscription->status;
        $stripe_price = $plan->stripe_plan;
        $subscription_item_stripe_id = $subscription->items->data[0]->id;
        $quantity = 1;
        $stripe_product = $subscription->plan->product;
        $user->stripe_id = $stripeCustomer->id;
        $user->save();

    // subscription db
        $subscription_db = Subscription::create([
                'user_id' => $user->id,
                'stripe_id' => $subscription_stripe_id,
                'stripe_status' => $stripe_status,
                'stripe_price' => $stripe_price,
                'quantity' => $quantity,
            ]);
       $subscriptionlastid = $subscription_db->id;

   //  // subscription_item db
        $subscription_item_db = Subscription_Item::create([
            'subscription_id' => $subscriptionlastid,
            'stripe_id' => $subscription_item_stripe_id,
            'stripe_product' => $stripe_product,
            'stripe_price' => $stripe_price,
            'quantity' => $quantity,
        ]);

        return redirect('https://smugglers-system.com/');


    }

    
   

}
