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
      $vehicles = VehicleRegistration::orderBy('created_at', 'DESC')->get();
      return view('vehicle.index', compact('vehicles'));
   }
   public function create()
   {
      return view('vehicle.register');
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

      $data = [
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'make' => $request->make,
         'model' => $request->model,
         'year' => $request->year,
         'vin' => $request->vin,
      ];
      $record = VehicleRegistration::updateOrCreate([
         'license_no' => $request->license_plate
      ], $data);
      if ($record) {
         $id  = $record->id;
         $complain = new Complain();
         $complain->complain = $request->complaint;
         $complain->vehicle_id = $id;
         $complain->save();
         return back()->with('success', 'Vehichle is registerd/updated Successfully');
      }
   }
   public function show($id){
      $vehicle = VehicleRegistration::findorFail($id);
      return view('vehicle.details');
   }
}
