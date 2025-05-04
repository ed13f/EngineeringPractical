<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use Exception;

class WeatherController extends Controller
{
    public function weatherforecast(ApiService $apiService)
    {
        $params = [
            "latitude" => 35.2383,
            "longitude" => 80.7905,
            "current" => [
                "temperature_2m",
                "wind_speed_10m",
                "relative_humidity_2m",
                "rain",
                "snowfall"
            ],
            "timezone" => "America/New_York",
            "wind_speed_unit" => "mph",
            "temperature_unit" => "fahrenheit",
            "precipitation_unit" => "inch"
        ];

        try {
            $data = $apiService->get('v1/forecast', $params);

            $temperature = $data['current']['temperature_2m'] . ' ' .$data['current_units']["temperature_2m"];
            $humidity = $data['current']['relative_humidity_2m'] . $data['current_units']["relative_humidity_2m"];
            $wind_speed = $data['current']['wind_speed_10m'] . ' ' . $data['current_units']["wind_speed_10m"];

            if ($data['current']["rain"]) {
                $condition = "Rainy";
            } elseif ($data['current']["snowfall"]) {
                $condition = "Snowy";
            } else {
                $condition = "Sunny";
            }

            return view('welcome', [
                'temperature' => $temperature,
                'condition' => $condition,
                'humidity' => $humidity,
                'wind_speed' => $wind_speed,
                'error' => false
            ]);
        } catch (Exception $e) {
            Log::error("Weather API error: " . $e->getMessage());

            return view('welcome', [
                'error' => 'Unable to fetch weather data. Please try again later.'
            ]);
        }
    }
}
