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


class UpdateMakePaymentController extends Controller
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

    
    public function update_make_payment(Request $request)
    {
        $user = Auth::user();

        $plan = getUserPlanDetails($user->plan_id);

        $get_trail_ends_at = $user->trial_ends_at;
                if ($get_trail_ends_at) {
                    $trialEndsAt = Carbon::parse($get_trail_ends_at);
                    $remainingDays = Carbon::now()->diffInDays($trialEndsAt, false); // `false` includes negative values if trial ended
                    if ($remainingDays > 0) {
                        // echo "$remainingDays days remaining in the trial.";
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
                          'trial_period_days' => $remainingDays,
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
                    }
                    else {
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
                        // dd($stripeCustomer);
                           $subscription =  $stripe->subscriptions->create([
                          'customer' => $stripeCustomer->id,
                          'items' => [
                            ['price' => $plan->stripe_plan],
                          ],
                           'proration_behavior' => 'create_prorations', // Optional: handle proration if needed
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

                    // subscription_item db
                        $subscription_item_db = Subscription_Item::create([
                            'subscription_id' => $subscriptionlastid,
                            'stripe_id' => $subscription_item_stripe_id,
                            'stripe_product' => $stripe_product,
                            'stripe_price' => $stripe_price,
                            'quantity' => $quantity,
                        ]);

        $end_date = null;
        $is_trial = false;
        $plan_name = $plan->name;
        $formatted_plan_name = strtolower($plan_name);

        $dataSubscription = prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $plan);

        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

         // Make the API calls
        $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

        
            // Process responses or handle errors accordingly
            if (!$responseBodySubscription) {
                return redirect()->back()->with('error', 'Error submitting Api.');
            }
                            
                    }
                } 
                else {
                // echo "Trial end date not available.";
                    session()->flash('error', 'something is missing!');
                    return redirect('/add_a_card');
                }

        session()->flash('message', 'Card added Successfully!');
        return redirect('/add_a_card');

    }
    



    

   

}
