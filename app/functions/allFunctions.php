<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Plan;
use App\Models\Home_Text;
use App\Models\Home_Text2;
use App\Models\Circle_Text;
use App\Models\Home_Videos;
use App\Models\Home_Images;
use App\Models\Graphic_Text;
use App\Models\Home_Steps;
use App\Models\About_Us;
use App\Models\Integrations;
use App\Models\Calc_Text;
use App\Models\Journey;
use App\Models\Integrations_Cat;
use App\Models\Testimonial;
use App\Models\Subscription;
use App\Models\Subscription_Item;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;



	function getPlans()
    {
	        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

	        return Plan::where('price', '!=', 0)
	            ->select('id', 'name', 'slug', "{$stripePlanColumn} as stripe_plan", 'price', 'description', 'duration', 'plan')
	            ->orderBy('id', 'ASC')
	            ->get();
    }

    function getUserPlanDetails($planId)
	{
	    $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

	    return Plan::where('id', $planId)
	                ->select('id', 'name', 'slug', "{$stripePlanColumn} as stripe_plan", 'price', 'description', 'duration', 'plan')
	                ->first();
	}

	function getPlanByPriceId($priceId)
	{
	    $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

	    return Plan::where($stripePlanColumn, $priceId)
					->select('id', 'name', 'slug', "{$stripePlanColumn} as stripe_plan", 'price', 'description', 'duration', 'plan')
	               ->first();
	}

   function StateFetchDropdown()
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

            return $responseBody;
        } catch (\Exception $e) {
            Log::error('Error in StateFetchDropdown: ' . $e->getMessage());
            return null; // Return null or handle the error as needed.
        }
    }

    function getStoresByState(string $state, string $filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $licenseValid = false;
        $storeData = [];
        $allStoreNames = [];

        // First pass: Find a single store matching the state
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
            if ($data[6] === $state) {
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
                break; // Stop after finding the first matching store
            }
        }

        // Second pass: Collect all store names matching the state
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
            if ($data[6] === $state) {
                $allStoreNames[] = $data[2];
            }
        }

        return [
            'licenseValid' => $licenseValid,
            'storeData' => $storeData,
            'allStoreNames' => $allStoreNames,
        ];
    }

	function makeApiCall($url, $data)
	{
	    $client = new Client();
	    $apiToken = env('API_Smugglers_Authorization');

	    try {
	        $response = $client->post($url, [
	            'json' => $data,
	            'headers' => [
	                'Authorization' => $apiToken,
	            ],
	        ]);

	        $responseBody = json_decode($response->getBody()->getContents(), true);

	        if (json_last_error() !== JSON_ERROR_NONE) {
	            throw new \Exception('JSON decode error: ' . json_last_error_msg());
	        }

	        return $responseBody;
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
	        Log::error('Error in makeApiCall: ' . $e->getMessage());
	        return redirect()->back()->with('error', 'Error submitting store info: ' . $e->getMessage());
	    }
	}

	function prepareDataForOnboarding($request, $user, $plan, $formatted_plan_name, $is_trial)
	{
	    return [
	        'first_name' => $request->first_name,
	        'last_name' => $request->last_name,
	        'username' => $user->username,
	        'password' => $user->password_apo,
	        'email' => $user->email,
	        'phone_number' => $user->phone,
	        'license_number' => $request->License_old,
	        'store_address' => $request->store_address,
	        'store_name' => $request->store_name,
	        'store_county' => $request->store_county,
	        'store_state' => $request->state_old,
	        'subscription_plan' => $formatted_plan_name,
	        'is_trial' => $is_trial,
	        'source_object_id' => $user->source_object_id,
	        'billing_frequency' => $plan->duration,
	    ];
	}

	function prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $plan)
	{
	    return [
	        'subscription_plan' => $formatted_plan_name,
	        'trial_expiry_date' => $end_date,
	        'is_trial' => $is_trial,
	        'source_object_id' => $user->source_object_id,
	        'billing_frequency' => $plan->duration,
	    ];
	}