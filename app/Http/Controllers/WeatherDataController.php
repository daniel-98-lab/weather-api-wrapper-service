<?php

namespace App\Http\Controllers;

use App\Responses\WeatherResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherDataController extends Controller
{

    public function getWeather(Request $request)
    {

        // Get route and  values
        $location = $request->route('location');
        $dateFrom = $request->route('dateFrom');
        $dateTo = $request->route('dateTo');
        $unitGroup = $request->query('unitGroup');

        // Create Redis key
        $cacheKey = "weather:{$location}:{$dateFrom}:{$dateTo}";

        // Verify if the response was save in cache
        $cachedData = Cache::get($cacheKey);

        // If the response exists in the cache, return it directly
        if($cachedData) {
            return response()->json(new WeatherResponse($cachedData), 200);
        }

        // API key from .env and Base URL for the API
        $apiKey = config('app.visualCrossing.visualcrossing_api_key');
        $baseUrl = config('app.visualCrossing.visualcrossing_url');


        // Construct the URL
        $url = $baseUrl . '/' . $location;

        if ($dateFrom) {
            $url .= '/' . $dateFrom;

            if ($dateTo)
                $url .= '/' . $dateTo;
        }

        // Add API key as a query parameter
        $queryParams = ['key' => $apiKey, 'unitGroup' => $unitGroup];

        try {
            // Make the HTTP GET request using Http Facade
            $response = Http::get($url, $queryParams);

            // Check if the request was successful
            if ($response->successful()) {

                // Cache response (expires in 1 hour)
                Cache::put($cacheKey, $response->json(), now()->addHours(1));
                Log::info("reponse");

                return response()->json(new WeatherResponse($response->json()), 200);
            }

            return response()->json([
                'error' => 'Failed to fetch weather data',
                'status' => $response->status(),
                'message' => $response->body(),
            ], $response->status());

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while fetching weather data',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
