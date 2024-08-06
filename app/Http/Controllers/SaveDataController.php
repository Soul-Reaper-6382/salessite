<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataScrapper; // Adjust this to your actual model

class SaveDataController extends Controller
{
    /**
     * Store the data in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Create a new instance of your model and save the data
        $data = new DataScrapper();
        $data->userid = $request->key;
        $data->data = $request->value;
        $data->url = $request->url;
        $data->save();

        // Return a JSON response
        return response()->json(['message' => 'Data saved successfully'], 201);
    }
}
