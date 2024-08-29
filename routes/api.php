<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Devio\Pipedrive\Pipedrive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request){
    $token = env('PIPEDRIVE_API_TOKEN');
    $pipedrive = new Pipedrive($token);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/webhook/deal', function (Request $request) {
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

Route::get('/deal/{id}', function (Request $request, int $id) {
    $apiToken = env('PIPEDRIVE_API_TOKEN');
    $baseUrl = env('PIPEDRIVE_URL');
    // Create a new Guzzle client
    $client = new Client();
    $data = ['id' => $id, 'value' => rand(100,5000)];
    // Prepare the URL with the deal ID
    $url = "{$baseUrl}/api/v2/deals/{$id}?api_token={$apiToken}";
    try {
        // Make the PATCH request
        $response = $client->request('PATCH', $url, [
            'json' => $data,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        // Get the response body and status code
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();


        // Return the response
        return response()->json([
            'status' => $statusCode,
            'data' => json_decode($body),
        ]);

    } catch (\GuzzleHttp\Exception\RequestException $e) {
        // Log error details

        // Return error response
        return response()->json([
            'status' => $e->getCode(),
            'message' => $e->getMessage(),
        ], $e->getCode());
    }
});