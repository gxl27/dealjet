<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/webhook/deal', function (Request $request) {
    $requestData = $request->all();

    // Log the request data as an array
    Log::info('Request Data:', $requestData);

    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    $serverName = $request->getHost();

    // Log the server name
    Log::info('Server Name: ' . $serverName);
    
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});