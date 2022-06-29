<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/manage-users', [UserController::class, 'index'])->name('manage.users');
Route::get('/add-user', [UserController::class, 'create'])->name('users.add');
Route::post('/add-user', [UserController::class, 'store'])->name('users.add.post');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/edit-user/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.delete');

Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change.password');

Route::get('/vehicle-registration', [VehicleRegistrationController::class, 'create'])->name('vehicle.register');
Route::get('/registered-vehicles', [VehicleRegistrationController::class, 'index'])->name('registred.vehicles');
Route::post('/vehicle-registration', [VehicleRegistrationController::class, 'vehicleRegisrationPost'])->name('vehicle.register.post');
Route::post('/ajax-search', [AjaxController::class, 'index'])->name('ajax.search');


