<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Plan;
use App\Models\Home_Text;
use App\Models\Home_Text2;
use App\Models\Circle_Text;
use App\Models\Home_Videos;
use App\Models\Home_Images;
use App\Models\Graphic_Text;
use App\Models\Home_Steps;
use App\Models\Integrations;
use App\Models\Calc_Text;
use App\Models\Integrations_Cat;
use App\Models\Testimonial;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function stateget_change_home(Request $request)
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

    public function statefetch_func_home(Request $request)
    {
        $client = new Client();
      try {
        $response = $client->get('https://api.smugglers-system.com/api/application/public/states');
        
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

    
    public function all_integration()
    {
        // Auth()->logout();
        // return view('home');
        
        $circleTextSettings = Circle_Text::first();
        $categories  = Integrations_Cat::with('integrations')->get();

            return view('all_integration', compact('circleTextSettings','categories'));

        
         
        }

   
    public function pricing()
    {
        $plan_db = Plan::where('price', '!=', 0)->orderBy('id', 'ASC')->get();
        $textSettings = Home_Text::first();
        $home_text2 = Home_Text2::first();
        $circleTextSettings = Circle_Text::first();
         $videoSettings = Home_Videos::first();
        $images = Home_Images::orderBy('reorder', 'asc')->get();
        $steps = Home_Steps::all();
        $integrations = Integrations::orderBy('id', 'desc')->limit(12)->get();

        $testimonials = Testimonial::all();
        $graphic_text = Graphic_Text::first();
        $calcSettings = Calc_Text::first();


        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

         // Fetch Stripe customer details
        $stripeCustomer = null;
        $paymentMethods = [];
        $subscription = null;

        if (Auth::check() && Auth::user()->stripe_id) {
            // Retrieve customer from Stripe
            $stripeCustomer = $stripe->customers->retrieve(Auth::user()->stripe_id, []);

            // Retrieve subscription details
            $subscriptions = $stripe->subscriptions->all([
                'customer' => $stripeCustomer->id,
            ]);

        $subscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
        
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        return view('pricing', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','priceId','testimonials','graphic_text','calcSettings'));
        }
        else{
            return view('pricing', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','testimonials','graphic_text','calcSettings'));
        }
    }

    public function aboutus()
    {
        

        $testimonials = Testimonial::all();


        

        return view('aboutus', compact('testimonials'));
    }

    public function index()
    {
        // Auth()->logout();
        // return view('home');
        $plan_db = Plan::where('price', '!=', 0)->orderBy('id', 'ASC')->get();
        $textSettings = Home_Text::first();
        $home_text2 = Home_Text2::first();
        $circleTextSettings = Circle_Text::first();
         $videoSettings = Home_Videos::first();
        $images = Home_Images::orderBy('reorder', 'asc')->get();
        $steps = Home_Steps::all();
        $integrations = Integrations::orderBy('id', 'desc')->limit(12)->get();

        $testimonials = Testimonial::all();
        $graphic_text = Graphic_Text::first();


        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

         // Fetch Stripe customer details
        $stripeCustomer = null;
        $paymentMethods = [];
        $subscription = null;

        if (Auth::check() && Auth::user()->stripe_id) {
            // Retrieve customer from Stripe
            $stripeCustomer = $stripe->customers->retrieve(Auth::user()->stripe_id, []);

            // Retrieve subscription details
            $subscriptions = $stripe->subscriptions->all([
                'customer' => $stripeCustomer->id,
            ]);

        $subscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
        
        $priceId = $subscription ? $subscription->items->data[0]->price->id : 'N/A';

        return view('home', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','priceId','testimonials','graphic_text'));
        }
        else{
            return view('home', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','testimonials','graphic_text'));
        }

        
         
        }

   

}
