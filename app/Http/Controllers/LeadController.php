<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\UserDetail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Exception\RequestException;

class LeadController extends Controller
{
    /**
     * Store lead in HubSpot after validating store license and name.
     */
    public function submit_home_lead(Request $request)
    {
        // dd($request->all());
        $leadDetails = [
            'email' => $request['email'],
            'firstname' => $request['first_name'],
            'lastname' => $request['last_name'],
            'phone' => $request['phone'],
            'state' => '',
            'store_license' => '',
            'store_name' => '',
        ];

        $result = storeNewLead($leadDetails);
        return response()->json($result);
    }

    public function storeLead(Request $request)
    {
        try {
            // Fetch the request data
            $licenseNumber = $request->store_license;
            $statefetch = $request->statefetch;
            $storeName = $request->store_name;

            $existingRecord = null; // Initialize the variable
            if (!empty($licenseNumber) || !empty($storeName)) {
            $existingRecord = UserDetail::where(function ($query) use ($licenseNumber, $storeName) {
            if ($licenseNumber) {
                $query->where('lic_no', $licenseNumber);
            }
            if ($storeName) {
                $query->orWhere('store_name', $storeName);
            }
            })->first();
            }

            if ($existingRecord) {
                return response()->json(['status' => 'error', 'message' => 'Store name or License already exists']);
            }
             // Fetch stores based on state and/or license number
            $storeData = getStoresByStateORLic($storeName, $licenseNumber);
            
            if (isset($storeData['error'])) {
            return response()->json(['status' => 'error', 'message' => $storeData['error']]);
            }

            if (!empty($licenseNumber) || !empty($storeName)) {
            if (empty($storeData['stores'])) {
                return response()->json(['status' => 'error', 'message' => 'No stores found. Please make sure the info you provided is correct.']);
            }
            }

            // Prepare lead data for HubSpot API
            $leadData = [
                'properties' => [
                    'state'     => $request->input('statefetch'),
                    'store_license' => $request->input('store_license'),
                    'store_name' => $request->input('store_name'),
                ],
            ];

            // HubSpot API URL
            $updateContactUrl = "https://api.hubapi.com/crm/v3/objects/contacts/{$request->input('lastHUBId')}";

            // Send request with Guzzle
            $client = new Client();
            $response = $client->patch($updateContactUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => $leadData,
            ]);
            $responseMsg =  json_decode($response->getStatusCode(), true);
            if ($responseMsg === 200) {
            $responseMsg_success = json_decode($response->getBody()->getContents(), true);
                return response()->json(['status' => 'success', 'message' => 'Lead successfully updated.', 'id' => $responseMsg_success['id']]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to create a lead'. $e->getMessage()]);
            }
        } catch (\Exception $e) {
            if ($e->getResponse() && $e->getResponse()->getStatusCode() === 409) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            return $responseBody;
            }
            return ['status' => 'error', 'message' => 'Failed to create a lead'. $e->getMessage()];
        }
    }
}
