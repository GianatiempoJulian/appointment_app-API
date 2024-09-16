<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\ServicieController;
use App\Http\Controllers\AppointmentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//*====  CUSTOMER ROUTES  ====*//
Route::get('/customers', [CustomerController::class, 'index']); // Get All
Route::get('/customers/{customer}', [CustomerController::class, 'show']);  // Get by ID

Route::post('/customers', [CustomerController::class, 'store']); // create
Route::put('/customers/{customer}', [CustomerController::class, 'update']); // update
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']); // delete

//*====  EMPLOYEE ROUTES  ====*//
Route::get('/employees', [EmployeeController::class, 'index']); // Get All
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);  // Get by ID

Route::post('/employees', [EmployeeController::class, 'store']); // create
Route::put('/employees/{employee}', [EmployeeController::class, 'update']); // update
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']); // delete

//*====  SPECIALITY ROUTES  ====*//
Route::get('/specialities', [SpecialityController::class, 'index']); // Get All
Route::get('/specialities/{speciality}', [SpecialityController::class, 'show']);  // Get by ID

Route::post('/specialities', [SpecialityController::class, 'store']); // create
Route::put('/specialities/{speciality}', [SpecialityController::class, 'update']); // update
Route::delete('/specialities/{speciality}', [SpecialityController::class, 'destroy']); // delete

//*====  SERVICIE ROUTES  ====*//
Route::get('/servicies', [ServicieController::class, 'index']); // Get All
Route::get('/servicies/{servicie}', [ServicieController::class, 'show']);  // Get by ID

Route::post('/servicies', [ServicieController::class, 'store']); // create
Route::put('/servicies/{servicie}', [ServicieController::class, 'update']); // update
Route::delete('/servicies/{servicie}', [ServicieController::class, 'destroy']); // delete

//*====  APPOINTMENT ROUTES  ====*//
Route::get('/appointments', [AppointmentController::class, 'index']); // Get All
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);  // Get by ID

Route::post('/appointments', [AppointmentController::class, 'store']); // create
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']); // update
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']); // delete



