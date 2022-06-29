<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\VehicleRegistration;
use Illuminate\Http\Request;

class VehicleRegistrationController extends Controller
{
   public function __construct()
   {
      $this->middleware(['auth']);
   }
   public function index()
   {
      return view('vehicle.register');
   }

   public function vehicleRegisrationPost(Request $request)
   {
      $v_registration = new VehicleRegistration();

      $request->validate([
         'license_plate' => 'required',
         'name' => 'required',
         'email' => 'required|email',
         'phone' => 'required',
         'make' => 'required',
         'model' => 'required',
         'year' => 'required',
         'vin' => 'required',
      ]);
      $v_registration->license_no = $request->license_plate;
      $v_registration->name = $request->name;
      $v_registration->email = $request->email;
      $v_registration->phone = $request->phone;
      $v_registration->make = $request->make;
      $v_registration->model = $request->model;
      $v_registration->year = $request->year;
      $v_registration->vin = $request->vin;
      $v_registration->save();
      if ($v_registration) {
         $id  = $v_registration->id;
         $complain = new Complain();
         $complain->complain = $request->complaint;
         $complain->vehicle_id = $id;
         $complain->save();
      }
      return back()->with('success', 'Vehichle is registerd Successfully');
   }
}
