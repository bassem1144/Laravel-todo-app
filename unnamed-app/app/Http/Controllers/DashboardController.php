<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $response = $this->makeApiRequest();

        // $fixtures = $response->json();

        return view('dashboard', ['fixtures' => $response]);
    }

    public function makeApiRequest()
    {
        $response = Http::withHeaders([
            'x-rapidapi-key' => '3a8f79aafa61f6d4ab1ddd0f18e8ea70',
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get('https://v3.football.api-sports.io/fixtures',  ['live' => 'all']);

        return $response->json(); // Use json() to directly parse JSON response
    }
}
