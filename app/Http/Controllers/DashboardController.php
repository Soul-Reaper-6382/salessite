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


class DashboardController extends Controller
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

        $plan = Plan::where('id',$user->plan_id)
                     ->select('id', 'name', 'slug', $stripePlanColumn . ' as stripe_plan', 'price', 'description', 'duration', 'plan')
                     ->first();

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

            // Set up the subscription to change to a paid plan after the trial ends
            $stripe->subscriptions->update($subscription->id, [
                'items' => [
                    [
                        'id' => $subscription->items->data[0]->id,
                        'price' => $plan->stripe_plan, // This should be the price ID for the paid plan
                    ],
                ],
                'proration_behavior' => 'create_prorations', // Optional: handle proration if needed
            ]);

        return redirect('https://smugglers-system.com/');


    }
    
    public function update_make_payment(Request $request)
    {
        $user = Auth::user();

        $plan = Plan::find($user->plan_id);

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

        $client = new Client();
        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';
        $apiToken = env('API_Smugglers_Authorization');

       
         $end_date = null;
         $is_trial = false;
         $plan_name = $plan->name;
         $formatted_plan_name = strtolower($plan_name);

              $secondData = [
                    'subscription_plan' => $formatted_plan_name,
                    'trial_expiry_date' => $end_date,
                    'is_trial' => $is_trial,
                    'source_object_id' => $user->source_object_id,
                ];


            try {
                // Second API call
                $secondResponse = $client->post($apiUrlStoreSubscriptionPlans, [
                    'json' => $secondData,
                    'headers' => [
                        'Authorization' => $apiToken,
                    ],
                ]);

                $secondResponseBody = json_decode($secondResponse->getBody()->getContents(), true);

            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $errorResponse = $e->getResponse();
                $errorBody = $errorResponse ? json_decode($errorResponse->getBody()->getContents(), true) : [];
                if (isset($errorBody['message']['errors'])) {
                    $validationErrors = '';
                    foreach ($errorBody['message']['errors'] as $error) {
                        $detail = $error['detail'];
                        $validationErrors .= ', ' . $detail;
                    }
                    $validationErrors = ltrim($validationErrors, ', ');
                    return redirect()->back()->with('error', $validationErrors)->withInput();
                }
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            } catch (\Exception $e) {
                // dd($e);
                return redirect()->back()->with('error', 'Error submitting store info: ' . $e->getMessage());
            }

        session()->flash('message', 'Payment Successfully!');
        return redirect('/dashboard');

    }
    public function index()
    {

        $layout = (Auth::user()->status == 1) ? 'layouts.dashboard' : 'layouts.reg';
            $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';
        $plan = Plan::where('id', Auth::user()->plan_id)
                ->select('id', 'name', 'slug', $stripePlanColumn . ' as stripe_plan', 'price', 'description', 'duration', 'plan')
               ->first();

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

         // Fetch Stripe customer details
        $stripeCustomer = null;
        $paymentMethods = [];
        $subscription = null;

        if (Auth::user()->stripe_id) {
            // Retrieve customer from Stripe
            $stripeCustomer = $stripe->customers->retrieve(Auth::user()->stripe_id, []);

            // Retrieve subscription details
            $subscriptions = $stripe->subscriptions->all([
                'customer' => $stripeCustomer->id,
            ]);

            $subscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
        
            // dd($subscription);
        $planName = $plan ? $plan->name : 'N/A';
        $planStatus = $subscription ? $subscription->status : 'Trial';
        $trialEnd = $subscription ? $subscription->trial_end : '';
        $billingInterval = $subscription ? $subscription->items->data[0]->plan->interval : 'N/A';
        $nextBillingDate = $subscription ? \Carbon\Carbon::createFromTimestamp($subscription->current_period_end) : null;
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        $plan_get_name = Plan::where($stripePlanColumn, $priceId)
               ->first();
        return view('dashboard', ['layout' => $layout, 'plan' => $plan,'stripeCustomer' => $stripeCustomer,
            'subscription' => $subscription,'planName' => $plan_get_name->name,
            'planStatus' => $planStatus,
            'trialEnd' => $trialEnd,
            'billingInterval' => $billingInterval,
            'nextBillingDate' => $nextBillingDate,
            'priceId' => $priceId]);
        }
        else{
            return view('dashboard', ['layout' => $layout, 'plan' => $plan]);
        }
    }

     public function billing_history_view()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripeCustomer = null;
        $subscription = null;
        $invoices = [];
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

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

        $plan_get_name = Plan::where($stripePlanColumn, $priceId)
               ->first();
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

     public function payment_method_view()
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripeCustomer = null;
        $paymentMethods = [];

        if (Auth::user()->stripe_id) {
            // Retrieve customer from Stripe
            $stripeCustomer = $stripe->customers->retrieve(Auth::user()->stripe_id, []);
            
            // Retrieve payment methods for the customer
            $paymentMethods = $stripe->paymentMethods->all([
                'customer' => $stripeCustomer->id,
                'type' => 'card',
            ]);
        

        return view('payment_method', [
            'stripeCustomer' => $stripeCustomer,
            'paymentMethods' => $paymentMethods->data,
        ]);
        }
        else{
        return view('payment_method');
        }
    }

    public function change_plan_view()
    {
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';
        $plan_db = Plan::where('price', '!=', 0)
        ->select('id', 'name', 'slug', $stripePlanColumn . ' as stripe_plan', 'price', 'description', 'duration', 'plan')
        ->orderBy('id', 'ASC')
        ->get(); 
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

            $subscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
        }

        $planStatus = $subscription ? $subscription->status : 'Trial';
        $billingInterval = $subscription ? $subscription->items->data[0]->plan->interval : 'N/A';
        $nextBillingDate = $subscription ? \Carbon\Carbon::createFromTimestamp($subscription->current_period_end) : null;
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        $plan_get_name = Plan::where($stripePlanColumn, $priceId)
               ->first();
        return view('change_plan', [
            'plan_db' => $plan_db,
            'priceId' => $priceId,
            'planId' => $plan_get_name->id
        ]);
    }

    public function starting_plan_set(Request $request)
    {
        $user = Auth::user();
        $newPlanId = $request->input('plan_id');
        $user->plan_id = $newPlanId;
        $user->save();
    }
     public function changePlan(Request $request)
    {
        $user = Auth::user();
        $newPlanId = $request->input('plan_id');
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

        // Retrieve new plan details from the database
        // Retrieve new plan details from the database
        $newPlan = Plan::where($stripePlanColumn, $newPlanId)->first();

        if (!$newPlan) {
            return response()->json(['error' => 'Plan not found.'], 404);
        }

        $subscription = null;

        if ($user->stripe_id) {
            // Retrieve Stripe customer subscriptions
            $subscriptions = $stripe->subscriptions->all(['customer' => $user->stripe_id]);
            $currentSubscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;

            if ($currentSubscription) {

                $stripe->subscriptions->update($currentSubscription->id, [
                    'cancel_at_period_end' => true,
                ]);

                // Update the local subscription status to 'canceled'
                Subscription::where('stripe_id', $currentSubscription->id)->update([
                    'stripe_status' => 'canceled',
                    'ends_at' => $currentSubscription->current_period_end,
                ]);
                // Update the subscription to the new plan
                $subscription = $stripe->subscriptions->update($currentSubscription->id, [
                    'items' => [['price' => $newPlan->stripe_plan]],
                    'prorate' => true,
                ]);

                $subscription = $stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $newPlan->stripe_plan]],
                ]);

                // Create Subscription record
                $subscriptionModel = Subscription::create([
                    'user_id' => $user->id,
                    'stripe_id' => $subscription->id,
                    'stripe_status' => $subscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'quantity' => 1, // Adjust quantity if needed
                    'ends_at' => $subscription->current_period_end,
                ]);

                // Create or update Subscription_Item record
                Subscription_Item::create([
                    'subscription_id' => $subscriptionModel->id,
                    'stripe_id' => $subscription->items->data[0]->id,
                    'stripe_product' => $subscription->items->data[0]->price->product,
                    'stripe_price' => $subscription->items->data[0]->price->id,
                    'quantity' => 1, // Adjust quantity if needed
                ]);
            } else {
                // Create a new subscription if none exists
                $subscription = $stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $newPlan->stripe_plan]],
                ]);

                // Create Subscription record
                $subscriptionModel = Subscription::create([
                    'user_id' => $user->id,
                    'stripe_id' => $subscription->id,
                    'stripe_status' => $subscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'quantity' => 1, // Adjust quantity if needed
                    'ends_at' => $subscription->current_period_end,
                ]);
                // Create or update Subscription_Item record
                Subscription_Item::create([
                    'subscription_id' => $subscriptionModel->id,
                    'stripe_id' => $subscription->items->data[0]->id,
                    'stripe_product' => $subscription->items->data[0]->price->product,
                    'stripe_price' => $subscription->items->data[0]->price->id,
                    'quantity' => 1, // Adjust quantity if needed
                ]);
            }

            $client = new Client();
       
         $end_date = null;
         $is_trial = false;
         $plan_name = $newPlan->name;
         $formatted_plan_name = strtolower($plan_name);

        $user->plan_id = $newPlan->id;
        $user->save();

              $secondData = [
                    'subscription_plan' => $formatted_plan_name,
                    'trial_expiry_date' => $end_date,
                    'is_trial' => $is_trial,
                    'source_object_id' => $user->source_object_id,
                ];


            try {
                // Second API call
                $secondResponse = $client->post('https://api.smugglers-system.dev/api/store/private/store-subscription-plans/', [
                    'json' => $secondData,
                    'headers' => [
                        'Authorization' => 'Token f65d76a173f603a97091a4be7aad79f9881a859d',
                    ],
                ]);

                $secondResponseBody = json_decode($secondResponse->getBody()->getContents(), true);

            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $errorResponse = $e->getResponse();
                $errorBody = $errorResponse ? json_decode($errorResponse->getBody()->getContents(), true) : [];

                if (isset($errorBody['message']['errors'])) {
                    $validationErrors = [];
                    foreach ($errorBody['message']['errors'] as $error) {
                        $validationErrors[] = $error['detail'];
                    }

                    return response()->json([
                        'success' => false,
                        'errors' => $validationErrors
                    ], $errorResponse->getStatusCode());
                }

                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred. Please try again.'
                ], $errorResponse->getStatusCode());
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error submitting store info: ' . $e->getMessage()
                ], 500);
            }


            return response()->json(['success' => 'Plan changed successfully.']);
        }

        return response()->json(['error' => 'User does not have a Stripe ID.'], 400);
    }

    public function monthly_yearly_view()
    {
        return view('monthly_yearly');
    }

     public function starting_plan_view()
    {
        $plan_db = Plan::where('price', '!=', 0)->orderBy('id', 'ASC')->get();
        return view('starting_plan', ['plan_db'=>$plan_db]);
    }

    public function changepassword()
    {
   return view('changepassword');
    }

    public function make_payment()
    {
    $user = Auth::user();
    $newPlan = Plan::where('id', $user->plan_id)->first();
    return view('make_payment',['plan' => $newPlan]);
    }

   
     public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed|string|min:8',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password),
                'password_apo' => $request->new_password
            ]);

            return back()->with("message", "Password changed successfully!");
    }


    
    public function statefetch_func(Request $request)
    {
        $client = new Client();
        $apiUrlStates = env('API_Smugglers_URL') . 'api/application/public/states';
        $apiToken = env('API_Smugglers_Authorization');
      try {
        $response = $client->get($apiUrlStates, [
            'headers' => [
                'Authorization' => $apiToken,
            ],
        ]);
        
        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Error response from API: ' . $response->getStatusCode());
        }

        $responseBody = json_decode($response->getBody()->getContents(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('JSON decode error: ' . json_last_error_msg());
        }

        return response()->json(['response' => $responseBody]);
    } catch (\Exception $e) {
        Log::error('Error in statefetch_func: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

     public function stateget_change(Request $request)
    {
        $state_get = $request->stateget_val;
        $path = public_path('Retail Package Store Licenses.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $licenseValid = false;
        $storeData = [];
        $allStoreNames = [];

         foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
            if ($data[6] === $state_get) {
                $licenseValid = true;
                $storeData = [
                    'license_no' => $data[0],
                    'entity_name' => $data[1],
                    'store_name' => $data[2],
                    'store_address' => $data[3],
                    'city' => $data[4],
                    'country' => $data[5],
                    'state' => $data[6],
                    'phone' => $data[7],
                ];
                break;
            }
        }
         foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
            if ($data[6] === $state_get) {
                $licenseValid = true;
                $allStoreNames[] = $data[2];

            }
        }
        return response()->json(['message' => $storeData,'storename' => $allStoreNames]);
    }
    
    public function submit_store_info(Request $request)
    {
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);

        // if($plan->name == 'Start'){
        $end_date = Carbon::now()->addMonths(2)->format('Y-m-d'); // Format as YYYY-MM-DD
        $is_trial = true;
        // $plan_name = 'Starter';
         // }
         // else{
         // $end_date = null;
         // $is_trial = false;
         $plan_name = $plan->name;
        // }
        $formatted_plan_name = strtolower($plan_name);
        $client = new Client();
        $apiUrlOnboard = env('API_Smugglers_URL') . 'api/store/public/onboarding/';
        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';
        $apiToken = env('API_Smugglers_Authorization');

            // Prepare data to be sent
            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $user->username,
                'password' => $user->password_apo, // Ensure this is the correct field or hash the password if needed
                'email' => $user->email,
                'phone_number' => $user->phone,
                'license_number' => $request->License_old,
                'store_address' => $request->store_address,
                'store_name' => $request->store_name,
                'store_county' => $request->store_county,
                'store_state' => $request->state_old,
                'subscription_plan' => $formatted_plan_name,
                // 'subscription_end_date' => $end_date,
                'is_trial' => $is_trial,
                'source_object_id' => $user->source_object_id,
                'billing_frequency' => $plan->duration,
            ];

            // dd($data);

             // Prepare data for the second API call
              $secondData = [
                    'subscription_plan' => $formatted_plan_name,
                    'trial_expiry_date' => $end_date,
                    // 'is_trial' => $is_trial,
                    'source_object_id' => $user->source_object_id,
                    'billing_frequency' => $plan->duration,
                ];
  
            // dd($secondData);

            try {
                // First API call
                $response = $client->post($apiUrlOnboard, [
                    'json' => $data,
                    'headers' => [
                        'Authorization' => $apiToken,
                    ],
                ]);

                $responseBody = json_decode($response->getBody()->getContents(), true);

                // Second API call
                $secondResponse = $client->post($apiUrlStoreSubscriptionPlans, [
                    'json' => $secondData,
                    'headers' => [
                        'Authorization' => $apiToken,
                    ],
                ]);

                $secondResponseBody = json_decode($secondResponse->getBody()->getContents(), true);

            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $errorResponse = $e->getResponse();
                $errorBody = $errorResponse ? json_decode($errorResponse->getBody()->getContents(), true) : [];
                if (isset($errorBody['message']['errors'])) {
                    $validationErrors = '';
                    foreach ($errorBody['message']['errors'] as $error) {
                        $detail = $error['detail'];
                        $validationErrors .= ', ' . $detail;
                    }
                    $validationErrors = ltrim($validationErrors, ', ');
                    return redirect()->back()->with('error', $validationErrors)->withInput();
                }
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            } catch (\Exception $e) {
                // dd($e);
                return redirect()->back()->with('error', 'Error submitting store info: ' . $e->getMessage());
            }


        $user->fname = $request->first_name;
        $user->lname = $request->last_name;
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

        $user->trial_ends_at = $end_date;
        $user->save();
        if($plan->name == 'Startabc'){
         }
         else if($plan->name == 'Startabc'){
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
        // dd($stripeCustomer);
           $subscription =  $stripe->subscriptions->create([
          'customer' => $stripeCustomer->id,
          'items' => [
            ['price' => $plan->stripe_plan],
          ],
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
        }
        else{

        }
        session()->flash('message', 'Account Created Successfully!');
        // if($plan->name == 'Start'){
        return redirect('/card_details');
        // }
        // else{
        return redirect('https://smugglers-system.com/');
        // }

    }

    public function submit_checkstore_license(Request $request)
    {

        $licenseNumber = $request->store_license;
        $statefetch = $request->statefetch;
        $storeName = $request->store_name;

        // Check if the license number and state already exist in the user_detail table
        $existingRecord = UserDetail::where(function ($query) use ($licenseNumber, $storeName) {
        if ($licenseNumber) {
            $query->where('lic_no', $licenseNumber);
        }
        if ($storeName) {
            $query->orWhere('store_name', $storeName);
        }
    })->where('store_state', $statefetch)->first();

    if ($existingRecord) {
        return response()->json(['message' => 'already_exist']);
    }
        $path = public_path('Retail Package Store Licenses.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $licenseValid = false;
        $storeData = [];

         foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
        if (($licenseNumber && $data[0] === $licenseNumber) || ($storeName && $data[2] === $storeName)) {
                $licenseValid = true;
                $storeData = [
                    'entity_name' => $data[1],
                    'store_name' => $data[2],
                    'store_address' => $data[3],
                    'city' => $data[4],
                    'country' => $data[5],
                    'state' => $data[6],
                    'phone' => $data[7],
                ];

                if ($statefetch != $storeData['state']) {
                return response()->json(['message' => 'notmatch']);
                }
                if($licenseNumber == null){
                $licenseNumber = $data[0];
                }
                break;
            }
        }

        if (!$licenseValid || $statefetch != $storeData['state']) {
            $error_license = 'notmatch';
            return response()->json(['message' => 'notmatch']);
        }
            return response()->json(['message' => 'match', 'storeData' => $storeData, 'licenseNumber' => $licenseNumber , 'statefetch' => $statefetch]);
   }

   

}
