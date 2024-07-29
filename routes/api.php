<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/webhook/deal', function (Request $request) {
    $requestData = $request->all();
    // Log the server name

    $serverName = $request->getHost();
    Log::info('GET Server Name: ' . $serverName);
    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

Route::post('/webhook/deal', function (Request $request) {
    $requestData = $request->all();
    // Log the server name

    $serverName = $request->getHost();
    Log::info('POST Server Name: ' . $serverName);
    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});