<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Log;
use Exception;

class WeatherController extends Controller
{
    public function weatherforecast()
    {
        return view('welcome');
    }
}
