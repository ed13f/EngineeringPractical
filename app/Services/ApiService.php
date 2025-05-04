<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.external_api.base_url');
    }

    public function get(string $endpoint, array $query = [])
    {
        try {
            $response = Http::get("{$this->baseUrl}/{$endpoint}", $query);
            return $response->json();
        } catch (RequestException $e) {
            report($e);
            return ['error' => 'API request failed. Please try to check you are connecting to the proper api endpoint'];
        }
    }
}
