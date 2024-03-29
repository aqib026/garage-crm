<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Models\VehicleRegistration;
use Illuminate\Support\Facades\Validator;

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


      // $request->validate([
      //    'license_plate' => 'required',
      //    'name' => 'required',
      //    'email' => 'required|email',
      //    'phone' => 'required',
      //    'make' => 'required',
      //    'model' => 'required',
      //    'year' => 'required',
      //    'vin' => 'required',
      //    'complaint' => 'required',
      // ]);
      $sValidationRules = [
         'license_plate' => 'required',
         'name' => 'required',
         'email' => 'required|email',
         'phone' => 'required',
         'make' => 'required',
         'model' => 'required',
         'year' => 'required',
         'vin' => 'required',
         'complaint' => 'required',
       ];
 
       $validator = Validator::make($request->all(), $sValidationRules);
 
       if ($validator->fails()) // on validator found any error 
       {
         // pass validator object in withErrors method & also withInput it should be null by default
          return back()->withErrors($validator)->withInput();
       }

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

         if ($complain) {
            if ($request->hasfile('file')) {
               foreach ($request->file('file') as $file) {
                  $name = time() . rand(1, 100) . '.' . $file->extension();
                  $file->move(public_path('files'), $name);
                  $file = new File();
                  $file->filenames = $name;
                  $file->vehicle_id = $record->id;
                  $file->complain_id = $complain->id;
                  $file->save();
               }
            }
         }
         return back()->with('success', 'Vehichle is registerd/updated Successfully');
      }
   }
   public function show($id)
   {
      $vehicle = VehicleRegistration::with('complains')->findorFail($id);

      return view('vehicle.details', compact('vehicle'));
   }
}
