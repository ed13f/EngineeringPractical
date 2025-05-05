<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use Exception;

class WeatherSearch extends Component
{
    public $latitude;
    public $longitude;

    public $temperature; 
    public $humidity;
    public $wind_speed;
    public $condition;
    public $error;

    protected $locationData;

    public function searchWeather()
    {
        // Validate input
        if (empty($this->latitude) || empty($this->longitude)) {
            $this->setError('Please provide both latitude and longitude.');
            return;
        }

        // Weather API parameters
        $params = [
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
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

        $apiService = app(ApiService::class);
        $this->locationData = $apiService->get('forecast', $params);

        if (!empty($this->locationData['error'])) {
            $this->setError('Unable to fetch weather data. Please try again later.');
            return;
        }

        // Assign weather data to component properties
        $this->temperature = $this->locationData['current']['temperature_2m'] . ' ' . $this->locationData['current_units']['temperature_2m'];
        $this->humidity = $this->locationData['current']['relative_humidity_2m'] . $this->locationData['current_units']['relative_humidity_2m'];
        $this->wind_speed = $this->locationData['current']['wind_speed_10m'] . ' ' . $this->locationData['current_units']['wind_speed_10m'];

        $this->condition = match (true) {
            $this->locationData['current']['rain']     => 'Rainy',
            $this->locationData['current']['snowfall'] => 'Snowy',
            default                                     => 'Sunny',
        };

        $this->error = false;
    }

    private function setError(string $message): void
    {
        $this->error = $message;
        $this->temperature = '';
        $this->humidity = '';
        $this->wind_speed = '';
        $this->condition = '';
    }

    public function render()
    {
        return view('livewire.weathersearch');
    }
}
