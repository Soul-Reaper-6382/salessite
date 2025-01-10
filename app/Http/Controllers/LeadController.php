<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Exception\RequestException;

class LeadController extends Controller
{
    /**
     * Store lead in HubSpot after validating store license and name.
     */
    public function storeLead(Request $request)
    {
        try {
            // Fetch the request data
            $licenseNumber = $request->store_license;
            $statefetch = $request->statefetch;
            $storeName = $request->store_name;

            // Validation: Check if required fields are empty
            if (empty($licenseNumber) || empty($statefetch) || empty($storeName)) {
                
            }
            else{

            // Load the Excel file to validate the store data
            $path = public_path('Retail Package Store Licenses.xlsx');
            $spreadsheet = IOFactory::load($path);
            $worksheet = $spreadsheet->getActiveSheet();

            $licenseValid = false;
            $storeData = [];

            // Iterate through rows in the Excel file
            foreach ($worksheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);
                $data = [];

                foreach ($cellIterator as $cell) {
                    $data[] = $cell->getValue();
                }

                // Check if store license or name matches
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

                    // If state doesn't match, return error
                    if ($statefetch != $storeData['state']) {
                        return response()->json(['message' => 'State does not match'], 400);
                    }
                    break;
                }
            }

            // If license is not valid, return an error
            if (!$licenseValid || $statefetch != $storeData['state']) {
                return response()->json(['message' => 'Invalid license or state mismatch'], 400);
            }
        }

            // Prepare lead data for HubSpot API
            $leadData = [
                'properties' => [
                    'email'     => $request->input('email'),
                    'firstname' => $request->input('first_name'),
                    'lastname'  => $request->input('last_name'),
                    'phone'     => $request->input('phone_number'),
                    'state'     => $request->input('statefetch'),
                    'store_license' => $request->input('store_license'),
                    'store_name' => $request->input('store_name'),
                ],
            ];

            // HubSpot API URL
            $url = 'https://api.hubapi.com/crm/v3/objects/contacts';

            // Send request with Guzzle
            $client = new Client();
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => $leadData,
            ]);

            // Return success response
            return response()->json(['message' => 'Lead submitted successfully']);
        } catch (RequestException $e) {
            // Handle error and display response from HubSpot
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $message = json_decode($response->getBody()->getContents(), true);
                return response()->json(['error' => $message], $response->getStatusCode());
            }
            return response()->json(['error' => 'An error occurred while submitting the lead'], 500);
        }
    }
}
