<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $vehicle = DB::table('vehicle_registrations')->where('license_no', 'LIKE', '%' . $request->license_no . "%")->first();
            if ($vehicle) {
                $date = \Carbon\Carbon::parse($vehicle->created_at);
                $vehicle->last_visit = $date->toFormattedDateString();

                return response()->json($vehicle);
            }
        }
    }
}
