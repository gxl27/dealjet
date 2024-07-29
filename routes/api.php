<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/webhook/deal', function (Request $request) {
    dd($request);
    $requestData = $request->all();
    // Log the server name

    $ipAddress = $request->ip();
    Log::info('GET IP CLIENT: ' . $ipAddress);
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

    $ipAddress = $request->ip();
    Log::info('POST IP CLIENT: ' . $ipAddress);
    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

Route::get('/webhook/person', function (Request $request) {
    dd($request);
    $requestData = $request->all();
    // Log the server name

    $ipAddress = $request->ip();
    Log::info('-- PERSON GET IP CLIENT: ' . $ipAddress);
    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

Route::post('/webhook/person', function (Request $request) {
    $requestData = $request->all();
    // Log the server name

    $ipAddress = $request->ip();
    Log::info('-- PERSON POST IP CLIENT: ' . $ipAddress);
    // Alternatively, you can log the request data as a JSON string
    Log::info('Request Data: ' . json_encode($requestData));

    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});