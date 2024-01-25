<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TimeZoneController extends Controller
{
    public function getTimeZone($latitude, $longitude)
    {
        $response = Http::get("https://api.geotimezone.com/public/timezone", [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
        $data = $response->json();
        // dd($data);

        if ($response->successful() && isset($data)) {
            return  response()->json([$data]);
        } else {
            return response()->json(['error' => 'Failed to get time zone information'], 500);
        }
    }
}
