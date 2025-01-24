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


class DashboardSubmitStoreController extends Controller
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


    public function submit_store_info(Request $request)
    {
        $client = new Client();
        $user = Auth::user();
        $plan = getUserPlanDetails($request->plan_id);
        $storeName = $request->store_name;
        $licenseNumber = $request->License_old;
        $getStoreInfo = getStoresByStateORLic($storeName, $licenseNumber);
        $plan_name = $plan->name;
        $formatted_plan_name = strtolower($plan_name);
        $start_date = Carbon::now();
        $end_date = null;
        $is_trial = false;
        $free_trial = $getStoreInfo['stores'][0]['free_trial'];
        $companyId = $getStoreInfo['stores'][0]['companyId'];

        if($free_trial == '' || $free_trial == 'No Free Trial'){
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $stripeCustomer = $stripe->customers->create([
                'payment_method' => $request->token,
                'name' => $request->first_name.' '.$request->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                 'invoice_settings' => [
                        'default_payment_method' => $request->token
                      ]
            ]);

             $subscription =  $stripe->subscriptions->create([
              'customer' => $stripeCustomer->id,
              'items' => [
                ['price' => $plan->stripe_plan],
              ],
            ]);

                $user_stripe_id = $subscription->customer;
                $subscription_stripe_id = $subscription->id;
                $stripe_status = $subscription->status;
                $stripe_price = $plan->stripe_plan;
                $subscription_item_stripe_id = $subscription->items->data[0]->id;
                $quantity = 1;
                $stripe_product = $subscription->plan->product;
                $user->stripe_id = $stripeCustomer->id;
                $user->save();

                 $subscription_db = Subscription::create([
                    'user_id' => $user->id,
                    'stripe_id' => $subscription_stripe_id,
                    'stripe_status' => $stripe_status,
                    'stripe_price' => $stripe_price,
                    'quantity' => $quantity,
                ]);
               $subscriptionlastid = $subscription_db->id;

               $subscription_item_db = Subscription_Item::create([
                    'subscription_id' => $subscriptionlastid,
                    'stripe_id' => $subscription_item_stripe_id,
                    'stripe_product' => $stripe_product,
                    'stripe_price' => $stripe_price,
                    'quantity' => $quantity,
                ]);
        }
        else{
            $start_date = Carbon::now();
                if (preg_match('/(\d+)\s*Day Free Trial/', $free_trial, $matches)) {
                    $days = (int) $matches[1];
                    $end_date = $start_date->addDays($days)->format('Y-m-d');
                } else {
                    $end_date = $start_date->format('Y-m-d');
                }
            $is_trial = true;
        }
        // Prepare data for both API calls
        $dataOnboarding = prepareDataForOnboarding($request, $user, $plan, $formatted_plan_name, $is_trial);
        $dataSubscription = prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $plan);

        
        $apiUrlOnboard = env('API_Smugglers_URL') . 'api/store/public/onboarding/';
        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

         // Make the API calls
        $responseBodyOnboarding = makeApiCall($apiUrlOnboard, $dataOnboarding);
        $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

        
            // Process responses or handle errors accordingly
            if (!$responseBodyOnboarding || !$responseBodySubscription) {
                return redirect()->back()->with('error', 'Error submitting store info.');
            }


        $user->fname = $request->first_name;
        $user->lname = $request->last_name;
        $user->trial_ends_at = $end_date;
        $user->status = 1;
        $user->save();

        UserDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'lic_no' => $request->License_old,
                'store_name' => $request->store_name,
                'entity_name' => $request->entity_name,
                'store_address' => $request->store_address,
                'store_city' => $request->store_city,
                'store_county' => $request->store_county,
                'store_state' => $request->store_state,
                'plan_id' => $request->plan_id,
            ]
        );

        $Company_update_storeId = [
                'properties' => [
                    'store_id'     => $user->source_object_id,
                ],
                ];

            // HubSpot API URL
            $updateCompanyUrl = "https://api.hubapi.com/crm/v3/objects/companies/{$companyId}";

        
            $response_company = $client->patch($updateCompanyUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => $Company_update_storeId,
            ]);

        
            session()->flash('message', 'Account Created Successfully!');
        if($is_trial){
            return redirect('/card_details');
        }
        else{
            return redirect('https://smugglers-system.com/');
        }
    }

    

}
