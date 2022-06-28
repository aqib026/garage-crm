<?php

namespace App\Http\Controllers;

use App\Models\VehicleRegistration;
use Illuminate\Http\Request;

class VehicleRegistrationController extends Controller
{
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
         'complaint' => 'required',
     ]);
      $v_registration->license_no = $request->license_plate;
      $v_registration->name = $request->name;
      $v_registration->email = $request->email;
      $v_registration->phone = $request->phone;
      $v_registration->make = $request->make;
      $v_registration->model = $request->model;
      $v_registration->year = $request->year;
      $v_registration->vin = $request->vin;
      $v_registration->complaint = $request->complaint;
      $v_registration->save();
       return back()->with('success','Vehichle is registerd Successfully');
   }
}
