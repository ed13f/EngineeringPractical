<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Livewire\WeatherSearch;
use App\Services\ApiService;
use Livewire\Livewire;
use Mockery;
use Illuminate\Support\Facades\Log;

class WeatherSearchTest extends TestCase
{
    /** @test */
    public function it_sets_error_when_latitude_or_longitude_are_missing()
    {
        Livewire::test(WeatherSearch::class)
            ->set('latitude', '')
            ->set('longitude', '')
            ->call('searchWeather')
            ->assertSet('error', 'Please provide both latitude and longitude.');
    }

    /** @test */
    public function it_sets_weather_data_correctly_on_successful_response()
    {
        $mockService = Mockery::mock(ApiService::class);
        $mockService->shouldReceive('get')
            ->once()
            ->andReturn([
                'current' => [
                    'temperature_2m' => 70,
                    'relative_humidity_2m' => 50,
                    'wind_speed_10m' => 10,
                    'rain' => true,
                    'snowfall' => 0
                ],
                'current_units' => [
                    'temperature_2m' => '°F',
                    'relative_humidity_2m' => '%',
                    'wind_speed_10m' => 'mph'
                ]
            ]);

        $this->app->instance(ApiService::class, $mockService);

        Livewire::test(WeatherSearch::class)
            ->set('latitude', 35.2383)
            ->set('longitude', -80.7905)
            ->call('searchWeather')
            ->assertSet('temperature', '70 °F')
            ->assertSet('humidity', '50%')
            ->assertSet('wind_speed', '10 mph')
            ->assertSet('condition', 'Rainy')
            ->assertSet('error', false);
    }

    /** @test */
    public function it_sets_error_if_api_returns_error_key()
    {
        $mockService = Mockery::mock(ApiService::class);
        $mockService->shouldReceive('get')
            ->once()
            ->andReturn(['error' => 'Some API error']);

        $this->app->instance(ApiService::class, $mockService);

        Livewire::test(WeatherSearch::class)
            ->set('latitude', 35.2)
            ->set('longitude', -80.7)
            ->call('searchWeather')
            ->assertSet('error', 'Unable to fetch weather data. Please try again later.');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }
}
