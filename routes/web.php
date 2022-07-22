<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\PartOrdersController;
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
Route::get('/vehicle-details/{id}', [VehicleRegistrationController::class, 'show'])->name('vehichle.show');
Route::post('/vehicle-registration', [VehicleRegistrationController::class, 'vehicleRegisrationPost'])->name('vehicle.register.post');
Route::post('/ajax-search', [AjaxController::class, 'index'])->name('ajax.search');
Route::get('/work-orders', [ComplaintController::class, 'index'])->name('work.orders');
Route::get('/complain-details/{id}', [ComplaintController::class, 'show'])->name('complain.show');
Route::post('/complain-update/{id}', [ComplaintController::class, 'update'])->name('complain.update');
Route::post('/complain-status-update/{id}', [ComplaintController::class, 'statusUpdate'])->name('complain.status.update');
Route::post('/complain-note-update/{id}', [ComplaintController::class, 'noteUpdate'])->name('note.update');

/* --------------------------------------- */
    /* dealer - Admin */
    /* --------------------------------------- */
    Route::get('dealers-list', [DealerController::class, 'index'])->name('dealer.index');
    Route::get('create-dealer', [DealerController::class, 'create'])->name('dealer.create');
    Route::post('create-dealer-store', [DealerController::class, 'store'])->name('dealer.store');
    Route::get('dealer/delete/{id}', [DealerController::class, 'destroy']);
    Route::get('edit-dealer/{id}', [DealerController::class, 'edit']);
    Route::post('dealer-update/{id}', [DealerController::class, 'update']);
/* --------------------------------------- */
    /* Parts order - Admin */
    /* --------------------------------------- */
    Route::get('parts-orders', [PartOrdersController::class, 'index'])->name('parts.orders.index');
    Route::get('create-orders', [PartOrdersController::class, 'create'])->name('parts.orders.create');
    Route::post('create-orders-store', [PartOrdersController::class, 'store'])->name('parts.orders.store');
    Route::get('orders/delete/{id}', [PartOrdersController::class, 'destroy']);
    Route::get('edit-parts-orders/{id}', [PartOrdersController::class, 'edit']);
    Route::post('parts-order-update/{id}', [PartOrdersController::class, 'update']);
    Route::get('view-order/{id}', [PartOrdersController::class, 'show']);


    Route::get('/new-row', [PartOrdersController::class, 'getnewRow'])->name('partorders.add');