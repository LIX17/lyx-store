<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function get_province(Request $request)
    {
        Return Province::all();
    }

    public function get_regency(Request $request, $province_id)
    {
        Return Regency::Where('province_id', $province_id)->get();
    }
}
