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

    
    
    
   //  public function update_make_payment(Request $request)
   //  {
   //      $user = Auth::user();

   //      $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

   //      $plan = Plan::where('id',$user->plan_id)
   //                   ->select('id', 'name', 'slug', $stripePlanColumn . ' as stripe_plan', 'price', 'description', 'duration', 'plan')
   //                   ->first();

   //       $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

   //      $stripeCustomer = $stripe->customers->create([
   //          'payment_method' => $request->token,
   //          'name' => $user->fname.' '.$user->last_name,
   //          'email' => $user->email,
   //          'phone' => $user->phone,
   //           'invoice_settings' => [
   //                  'default_payment_method' => $request->token
   //                ]
   //      ]);
   //      // dd($stripeCustomer);
   //         $subscription =  $stripe->subscriptions->create([
   //        'customer' => $stripeCustomer->id,
   //        'items' => [
   //          ['price' => $plan->stripe_plan],
   //        ],
   //         'proration_behavior' => 'create_prorations', // Optional: handle proration if needed
   //      ]);
   // // user db
   //      $user_stripe_id = $subscription->customer;
   //      $subscription_stripe_id = $subscription->id;
   //      $stripe_status = $subscription->status;
   //      $stripe_price = $plan->stripe_plan;
   //      $subscription_item_stripe_id = $subscription->items->data[0]->id;
   //      $quantity = 1;
   //      $stripe_product = $subscription->plan->product;
   //      $user->stripe_id = $stripeCustomer->id;
   //      $user->save();

   // // subscription db
   //  $subscription_db = Subscription::create([
   //          'user_id' => $user->id,
   //          'stripe_id' => $subscription_stripe_id,
   //          'stripe_status' => $stripe_status,
   //          'stripe_price' => $stripe_price,
   //          'quantity' => $quantity,
   //      ]);
   //     $subscriptionlastid = $subscription_db->id;

   //  // subscription_item db
   //      $subscription_item_db = Subscription_Item::create([
   //          'subscription_id' => $subscriptionlastid,
   //          'stripe_id' => $subscription_item_stripe_id,
   //          'stripe_product' => $stripe_product,
   //          'stripe_price' => $stripe_price,
   //          'quantity' => $quantity,
   //      ]);

   //      $client = new Client();
   //      $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';
   //      $apiToken = env('API_Smugglers_Authorization');

       
   //       $end_date = null;
   //       $is_trial = false;
   //       $plan_name = $plan->name;
   //       $formatted_plan_name = strtolower($plan_name);

   //            $secondData = [
   //                 'subscription_plan' => $formatted_plan_name,
   //                  'trial_expiry_date' => $end_date,
   //                  'is_trial' => $is_trial,
   //                  'source_object_id' => $user->source_object_id,
   //                  'billing_frequency' => $plan->duration,
   //              ];


   //          try {
   //              // Second API call
   //              $secondResponse = $client->post($apiUrlStoreSubscriptionPlans, [
   //                  'json' => $secondData,
   //                  'headers' => [
   //                      'Authorization' => $apiToken,
   //                  ],
   //              ]);

   //              $secondResponseBody = json_decode($secondResponse->getBody()->getContents(), true);

   //          } catch (\GuzzleHttp\Exception\ClientException $e) {
   //              $errorResponse = $e->getResponse();
   //              $errorBody = $errorResponse ? json_decode($errorResponse->getBody()->getContents(), true) : [];
   //              if (isset($errorBody['message']['errors'])) {
   //                  $validationErrors = '';
   //                  foreach ($errorBody['message']['errors'] as $error) {
   //                      $detail = $error['detail'];
   //                      $validationErrors .= ', ' . $detail;
   //                  }
   //                  $validationErrors = ltrim($validationErrors, ', ');
   //                  return redirect()->back()->with('error', $validationErrors)->withInput();
   //              }
   //              return redirect()->back()->with('error', 'An error occurred. Please try again.');
   //          } catch (\Exception $e) {
   //              // dd($e);
   //              return redirect()->back()->with('error', 'Error submitting store info: ' . $e->getMessage());
   //          }

   //      session()->flash('message', 'Payment Successfully!');
   //      return redirect('/dashboard');

   //  }
    public function index()
    {

        $layout = (Auth::user()->status == 1) ? 'layouts.dashboard' : 'layouts.reg';
            
        $plan = getUserPlanDetails(Auth::user()->plan_id);    

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

        $plan_get_name = getPlanByPriceId($priceId);

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
        $plan_db = getPlans();
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
        

        $planStatus = $subscription ? $subscription->status : 'Trial';
        $billingInterval = $subscription ? $subscription->items->data[0]->plan->interval : 'N/A';
        $nextBillingDate = $subscription ? \Carbon\Carbon::createFromTimestamp($subscription->current_period_end) : null;
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        $plan_get_name = getPlanByPriceId($priceId);
        if($planStatus == 'trialing'){
        return view('ChangePlanTrail.change_plan_trailing', [
            'plan_db' => $plan_db,
            'priceId' => $priceId,
            'planId' => $plan_get_name->id
        ]);
        }
        else{
        return view('ChangePlanActive.change_plan', [
            'plan_db' => $plan_db,
            'priceId' => $priceId,
            'planId' => $plan_get_name->id,
            'plan_duration' => $plan_get_name->duration
        ]);
        }

        }

    }

    
     

    public function monthly_yearly_view()
    {
        return view('monthly_yearly');
    }

    public function changepassword()
    {
   return view('changepassword');
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
         // Fetch stores based on state and/or license number
        $storeData = getStoresByStateORLic($storeName, $licenseNumber);

        // Check if we received valid data
        if (isset($storeData['error'])) {
            return response()->json(['message' => $storeData['error']]);
        }

        // Loop through fetched stores and check for a match
        foreach ($storeData['stores'] as $store) {
            if ($storeName && $store['name'] == $storeName) {
                return response()->json(['message' => 'match', 'storeData' => $store]);
            }

            if ($licenseNumber && $store['state_license_number'] == $licenseNumber) {
                return response()->json(['message' => 'match', 'storeData' => $store]);
            }

            if ($storeName && $licenseNumber && $store['name'] == $storeName && $store['state_license_number'] == $licenseNumber) {
                return response()->json(['message' => 'match', 'storeData' => $store]);
            }
        }

        // If no match found
        return response()->json(['message' => 'notmatch']);

        // $path = public_path('Retail Package Store Licenses.xlsx');
        // $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        // $worksheet = $spreadsheet->getActiveSheet();
        // $licenseValid = false;
        // $storeData = [];

        //  foreach ($worksheet->getRowIterator() as $row) {
        //     $cellIterator = $row->getCellIterator();
        //     $cellIterator->setIterateOnlyExistingCells(false);
        //     $data = [];
        //     foreach ($cellIterator as $cell) {
        //         $data[] = $cell->getValue();
        //     }
        // if (($licenseNumber && $data[0] === $licenseNumber) || ($storeName && $data[2] === $storeName)) {
        //         $licenseValid = true;
        //         $storeData = [
        //             'entity_name' => $data[1],
        //             'store_name' => $data[2],
        //             'store_address' => $data[3],
        //             'city' => $data[4],
        //             'country' => $data[5],
        //             'state' => $data[6],
        //             'phone' => $data[7],
        //         ];

        //         if ($statefetch != $storeData['state']) {
        //         return response()->json(['message' => 'notmatch']);
        //         }
        //         if($licenseNumber == null){
        //         $licenseNumber = $data[0];
        //         }
        //         break;
        //     }
        // }

        // if (!$licenseValid || $statefetch != $storeData['state']) {
        //     $error_license = 'notmatch';
        //     return response()->json(['message' => 'notmatch']);
        // }
        //     return response()->json(['message' => 'match', 'storeData' => $storeData, 'licenseNumber' => $licenseNumber , 'statefetch' => $statefetch]);
   }

   

}
