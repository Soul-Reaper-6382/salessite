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

	function getPlanByNameAndDuration($planName, $planDuration)
	{
		$stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

	    return Plan::where('name', $planName)
	               ->where('duration', $planDuration)
				   ->select('id', 'name', 'slug', "{$stripePlanColumn} as stripe_plan", 'price', 'description', 'duration', 'plan')
	               ->first();
	}

   // function StateFetchDropdown()
   //  {
   //      $client = new Client();
   //      $apiUrlStates = env('API_Smugglers_URL') . 'api/application/public/states';
   //      $apiToken = env('API_Smugglers_Authorization');

   //      try {
   //          $response = $client->get($apiUrlStates, [
   //              'headers' => [
   //                  'Authorization' => $apiToken,
   //              ],
   //          ]);

   //          if ($response->getStatusCode() !== 200) {
   //              throw new \Exception('Error response from API: ' . $response->getStatusCode());
   //          }

   //          $responseBody = json_decode($response->getBody()->getContents(), true);

   //          if (json_last_error() !== JSON_ERROR_NONE) {
   //              throw new \Exception('JSON decode error: ' . json_last_error_msg());
   //          }

   //          return $responseBody;
   //      } catch (\Exception $e) {
   //          Log::error('Error in StateFetchDropdown: ' . $e->getMessage());
   //          return null; // Return null or handle the error as needed.
   //      }
   //  }

	function storeNewLead(array $leadDetails)
	{
	    $client = new Client();
	    $url = 'https://api.hubapi.com/crm/v3/objects/contacts'; // HubSpot API endpoint for contacts
	    $apiToken = env('HUBSPOT_ACCESS_TOKEN'); // HubSpot Personal Access Token

	    try {
	        
	        $leadData = [
	            'properties' => [
	                'email'     => $leadDetails['email'],
	                'firstname' => $leadDetails['firstname'] ?? '',
	                'lastname'  => $leadDetails['lastname'] ?? '',
	                'phone'     => $leadDetails['phone'] ?? '',
	                'state'     => $leadDetails['state'] ?? '',
	                'store_license' => $leadDetails['store_license'] ?? '',
	                'store_name' => $leadDetails['store_name'] ?? '',
	            ],
	        ];

	        // Send POST request to HubSpot API
	        $response = $client->post($url, [
	            'headers' => [
	                'Authorization' => 'Bearer ' . $apiToken,
	                'Content-Type'  => 'application/json',
	            ],
	            'json' => $leadData,
	        ]);
	        $responseMsg =  json_decode($response->getStatusCode(), true);
	        // Check if the request was successful
	        if ($responseMsg === 201) {
	        $responseMsg_success = json_decode($response->getBody()->getContents(), true);
	            return ['status' => 'success', 'message' => 'Lead successfully created.', 'id' => $responseMsg_success['id']];
	        } else {
	        	return ['status' => 'error', 'message' => 'Failed to create a lead'. $e->getMessage()];
	        }
	    } catch (\Exception $e) {
	    	if ($e->getResponse() && $e->getResponse()->getStatusCode() === 409) {
	    	$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
	        return $responseBody;
			}
	        return ['status' => 'error', 'message' => 'Failed to create a lead'. $e->getMessage()];
	    }
	}


	function StateFetchDropdown()
	{
	    $client = new Client();
	    $url = 'https://api.hubapi.com/crm/v3/objects/companies';  // HubSpot API endpoint for companies
	    $apiToken = env('HUBSPOT_ACCESS_TOKEN');  // HubSpot Personal Access Token

	    try {
	        $uniqueStates = [];  // To store unique states
	        $hasNextPage = true;
	        $after = null;

	        while ($hasNextPage) {
	            // Set up the query parameters to fetch the 'state' property and limit the results per page
	            $queryParams = [
	                'properties' => 'state',  // Specify the 'state' property to retrieve
	                'limit' => 100,  // Adjust this to control how many records per page are fetched
	            ];

	            // Include the 'after' parameter if available for pagination
	            if ($after) {
	                $queryParams['after'] = $after;
	            }

	            // Make the GET request to HubSpot API to fetch companies
	            $response = $client->get($url, [
	                'headers' => [
	                    'Authorization' => 'Bearer ' . $apiToken,  // Bearer token for authentication
	                    'Content-Type'  => 'application/json',     // Ensure correct content type is set
	                ],
	                'query' => $queryParams  // Include query parameters like 'properties'
	            ]);

	            // Check if the request was successful (status code 200)
	            if ($response->getStatusCode() !== 200) {
	                throw new \Exception('Error response from HubSpot API: ' . $response->getStatusCode());
	            }

	            // Parse the response body
	            $responseBody = json_decode($response->getBody()->getContents(), true);

	            if (json_last_error() !== JSON_ERROR_NONE) {
	                throw new \Exception('JSON decode error: ' . json_last_error_msg());
	            }

	            // Merge the companies with 'state' property from this page of results
	            foreach ($responseBody['results'] as $company) {
	                if (isset($company['properties']['state'])) {
	                    $state = $company['properties']['state'];

	                    // Store unique states (use a simple array to track uniqueness)
	                    if (!in_array($state, $uniqueStates)) {
	                        $uniqueStates[] = $state;
	                    }
	                }
	            }

	            // Check for pagination and set the cursor for the next page
	            if (isset($responseBody['paging']['next']['after'])) {
	                $after = $responseBody['paging']['next']['after'];
	            } else {
	                $hasNextPage = false;
	            }
	        }

	        // Return the list of unique states
	        return $uniqueStates;

	    } catch (\Exception $e) {
	        // Log any errors that occur
	        Log::error('Error in StateFetchDropdown: ' . $e->getMessage());
	        return 'Failed to fetch states.';
	    }
	}


    // function getStoresByState(string $state, string $filePath)
    // {
    //     $spreadsheet = IOFactory::load($filePath);
    //     $worksheet = $spreadsheet->getActiveSheet();

    //     $licenseValid = false;
    //     $storeData = [];
    //     $allStoreNames = [];

    //     // First pass: Find a single store matching the state
    //     foreach ($worksheet->getRowIterator() as $row) {
    //         $cellIterator = $row->getCellIterator();
    //         $cellIterator->setIterateOnlyExistingCells(false);
    //         $data = [];
    //         foreach ($cellIterator as $cell) {
    //             $data[] = $cell->getValue();
    //         }
    //         if ($data[6] === $state) {
    //             $licenseValid = true;
    //             $storeData = [
    //                 'license_no' => $data[0],
    //                 'entity_name' => $data[1],
    //                 'store_name' => $data[2],
    //                 'store_address' => $data[3],
    //                 'city' => $data[4],
    //                 'country' => $data[5],
    //                 'state' => $data[6],
    //                 'phone' => $data[7],
    //             ];
    //             break; // Stop after finding the first matching store
    //         }
    //     }

    //     // Second pass: Collect all store names matching the state
    //     foreach ($worksheet->getRowIterator() as $row) {
    //         $cellIterator = $row->getCellIterator();
    //         $cellIterator->setIterateOnlyExistingCells(false);
    //         $data = [];
    //         foreach ($cellIterator as $cell) {
    //             $data[] = $cell->getValue();
    //         }
    //         if ($data[6] === $state) {
    //             $allStoreNames[] = $data[2];
    //         }
    //     }

    //     return [
    //         'licenseValid' => $licenseValid,
    //         'storeData' => $storeData,
    //         'allStoreNames' => $allStoreNames,
    //     ];
    // }

    function getStoresByState(string $state)
	{
	    $client = new Client();
	    $url = 'https://api.hubapi.com/crm/v3/objects/companies/search'; // HubSpot API endpoint
	    $apiToken = env('HUBSPOT_ACCESS_TOKEN'); // HubSpot Personal Access Token

	    try {
	        $hasNextPage = true;
	        $after = null;
	        $companiesData = []; // To store the final results

	        while ($hasNextPage) {
	            // Define the query parameters for HubSpot API
	            $queryParams = [
	                'filterGroups' => [
	                    [
	                        'filters' => [
	                            [
	                                'propertyName' => 'state',
	                                'operator' => 'EQ', // Exact match for the state property
	                                'value' => $state, // The state value to filter by
	                            ]
	                        ]
	                    ]
	                ],
	                'properties' => ['state', 'name', 'state_license_number'], // Specify the fields to fetch
	                'limit' => 100, // Max 100 records per page
	            ];

	            // Include pagination if `after` is set
	            if ($after) {
	                $queryParams['after'] = $after;
	            }

	            // Make the POST request to the HubSpot API
	            $response = $client->post($url, [
	                'headers' => [
	                    'Authorization' => 'Bearer ' . $apiToken, // Bearer token for authentication
	                    'Content-Type' => 'application/json', // Ensure correct content type is set
	                ],
	                'json' => $queryParams, // Send the query parameters as JSON
	            ]);

	            // Check if the response was successful
	            if ($response->getStatusCode() !== 200) {
	                throw new \Exception('Error fetching data from HubSpot API: ' . $response->getStatusCode());
	            }

	            // Decode the response body
	            $responseBody = json_decode($response->getBody()->getContents(), true);

	            if (json_last_error() !== JSON_ERROR_NONE) {
	                throw new \Exception('JSON decode error: ' . json_last_error_msg());
	            }

	            // Process the response to extract the required data
	            foreach ($responseBody['results'] as $company) {
	                $companiesData[] = [
	                    'name' => $company['properties']['name'] ?? '',
	                    'state_license_number' => $company['properties']['state_license_number'] ?? '',
	                ];
	            }

	            // Check for pagination and set the cursor for the next page
	            if (isset($responseBody['paging']['next']['after'])) {
	                $after = $responseBody['paging']['next']['after'];
	            } else {
	                $hasNextPage = false;
	            }
	        }

	        $userStore = UserDetail::get();

	        // Return the processed data
	        return ['stores' => $companiesData, 'userStores' => $userStore];

	    } catch (\Exception $e) {
	        // Log any errors that occur
	        Log::error('Error in getStoresByState: ' . $e->getMessage());
	        return ['error' => 'Failed to fetch companies by state.'];
	    }
	}


	function getStoresByStateORLic($storeName, $lic_no)
	{
	    $client = new Client();
	    $url = 'https://api.hubapi.com/crm/v3/objects/companies/search'; // HubSpot API endpoint
	    $apiToken = env('HUBSPOT_ACCESS_TOKEN'); // HubSpot Personal Access Token

	    try {
	        $hasNextPage = true;
	        $after = null;
	        $companiesData = []; // To store the final results

	        while ($hasNextPage) {
	            // Define the query parameters for HubSpot API
	            $filters = [];

	            if ($storeName) {
	                $filters[] = [
	                    'propertyName' => 'name',
	                    'operator' => 'EQ', // Exact match for the state property
	                    'value' => $storeName,
	                ];
	            }

	            if ($lic_no) {
	                $filters[] = [
	                    'propertyName' => 'state_license_number',
	                    'operator' => 'EQ', // Exact match for the license number property
	                    'value' => $lic_no,
	                ];
	            }

	            $queryParams = [
	                'filterGroups' => [
	                    [
	                        'filters' => $filters,
	                    ]
	                ],
	                'properties' => ['state', 'name', 'state_license_number', 'entity_name', 'address', 'city', 'license_county', 'free_trial'], // Specify the fields to fetch
	                'limit' => 100, // Max 100 records per page
	            ];

	            // Include pagination if `after` is set
	            if ($after) {
	                $queryParams['after'] = $after;
	            }

	            // Make the POST request to the HubSpot API
	            $response = $client->post($url, [
	                'headers' => [
	                    'Authorization' => 'Bearer ' . $apiToken, // Bearer token for authentication
	                    'Content-Type' => 'application/json', // Ensure correct content type is set
	                ],
	                'json' => $queryParams, // Send the query parameters as JSON
	            ]);

	            // Check if the response was successful
	            if ($response->getStatusCode() !== 200) {
	                throw new \Exception('Error fetching data from HubSpot API: ' . $response->getStatusCode());
	            }

	            // Decode the response body
	            $responseBody = json_decode($response->getBody()->getContents(), true);

	            if (json_last_error() !== JSON_ERROR_NONE) {
	                throw new \Exception('JSON decode error: ' . json_last_error_msg());
	            }

	            // Process the response to extract the required data
	            foreach ($responseBody['results'] as $company) {
	                $companiesData[] = [
	                    'name' => $company['properties']['name'] ?? '',
	                    'state_license_number' => $company['properties']['state_license_number'] ?? '',
	                    'state' => $company['properties']['state'] ?? '',
	                    'entity_name' => $company['properties']['entity_name'] ?? '',
	                    'address' => $company['properties']['address'] ?? '',
	                    'city' => $company['properties']['city'] ?? '',
	                    'license_county' => $company['properties']['license_county'] ?? '',
	                    'free_trial' => $company['properties']['free_trial'] ?? '',
	                ];
	            }

	            // Check for pagination and set the cursor for the next page
	            if (isset($responseBody['paging']['next']['after'])) {
	                $after = $responseBody['paging']['next']['after'];
	            } else {
	                $hasNextPage = false;
	            }
	        }

	        // Return the processed data
	        return ['stores' => $companiesData];

	    } catch (\Exception $e) {
	        // Log any errors that occur
	        Log::error('Error in getStoresByState: ' . $e->getMessage());
	        return ['error' => 'Failed to fetch companies by state or license number.'];
	    }
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