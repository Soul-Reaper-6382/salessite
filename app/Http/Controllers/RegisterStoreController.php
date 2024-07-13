<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Client;

class RegisterStoreController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }


//     public function check()
//     {
//         $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
//        $plan = Plan::find(1);
//    $subscription =  $stripe->subscriptions->create([
//   'customer' => 'cus_OXfsMPrDEWfZBk',
//   'items' => [
//     ['price' => 'price_1NjA68F5ufWtnIxqUvzyKaMH'],
//   ],
// ]);
//         dd($subscription->items->data[0]->id);
//     }
   public function registerstore(Request $request){
// $this->validate(request(), [
//             'username' => ['required', 'string', 'max:255', 'unique:users'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'email_confirmation' => ['required', 'same:email'],
//             'password' => ['required', 'string', 'min:8', 'confirmed'],
//             'first_name' => ['required', 'string', 'max:255'],
//             'last_name' => ['required', 'string', 'max:255'],
//             'store_license' => ['required', 'string', 'max:255'],
//             'privacy_policy' => ['accepted'],
//             ]);

        // Read the Excel file
    $filePath = public_path('Retail Package Store Licenses.xlsx');
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    $storeLicenses = $sheet->toArray();

    // Extract the license numbers (assuming the first column contains the license numbers)
    $licenseNumbers = array_column($storeLicenses, 0);

     $matchedRow = null;
    foreach ($storeLicenses as $row) {
        if ($row[0] === $request->store_license) {
            $matchedRow = $row;
            break;
        }
    }

    // Check if the provided store license is valid
    if ($matchedRow === null) {
        return redirect()->back()->withErrors(['store_license' => 'The store license number is not valid.']);
    }
    // Extract additional information from the matched row
    $storeName = $matchedRow[2] ?? null;
    $storeAddress = $matchedRow[3] ?? null;
    $storeCity = $matchedRow[4] ?? null;
    $storeCountry = $matchedRow[5] ?? null;
    $storeState = $matchedRow[6] ?? null;
    $phoneNumber = $matchedRow[7] ?? 'N/A';


    // $data = [
    //     'first_name' => $request['first_name'],
    //     'last_name' => $request['last_name'],
    //     'username' => $request['username'],
    //     'password' => $request['password'], // Use the plain text password
    //     'email' => $request['email'],
    //     'phone_number' => $phoneNumber,
    //     'license_number' => $request['store_license'],
    //     'store_address' => $storeAddress,
    //     'store_name' => $storeName,
    //     'store_county' => null,
    //     'store_state' => 25,
    // ];

    // // dd($data);

    // // Make the API call
    // $client = new Client();
    // $response = $client->post('https://api.smugglers-system.dev/api/store/public/onboarding/', [
    //     'json' => $data
    // ]);
    // // dd($response);
    // // Check for successful response
    // if (in_array($response->getStatusCode(), [200, 201])) {
        
    // } else {
    //     return redirect()->back()->withErrors(['username' => 'Registration Failed.']);
    // }
        // user db
        $user = User::create([
            'username' => $request['username'],
            'fname' => $request['first_name'],
            'lname' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'storelic' => $request['store_license'],
            'roles' => $request['roles'],
        ]);
        $user->roles()->attach($request['roles']);

        auth()->login($user);
        session()->flash('message', 'Registration Successfully!');
        return redirect('/dashboard');


   }

   
}
