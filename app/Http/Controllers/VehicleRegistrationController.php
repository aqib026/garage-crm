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
      $vehicles = VehicleRegistration::orderBy('created_at','DESC')->get();
      return view('vehicle.index',compact('vehicles'));
    
   }

   public function vehicleRegisrationPost(Request $request)
   {


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
      if ($request->vehicle_id != null) {
         $id  = $request->vehicle_id;
         $complain = new Complain();
         $complain->complain = $request->complaint;
         $complain->vehicle_id = $id;
         $complain->save();
         return back()->with('success', 'Complain registerd Successfully');

      } else {
         $v_registration = new VehicleRegistration();
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
   public function create(){
      return view('vehicle.register');
   }
}
