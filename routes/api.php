<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TypeServicieController;
use App\Http\Controllers\ServicieController;
use App\Http\Controllers\AppointmentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//*====  CUSTOMER ROUTES  ====*//
Route::get('/customers', [CustomerController::class, 'index']); 
Route::get('/customers/{customer}', [CustomerController::class, 'show']);  

Route::post('/customers', [CustomerController::class, 'store']); 
Route::put('/customers/{customer}', [CustomerController::class, 'update']); 
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']); 

//*====  EMPLOYEE ROUTES  ====*//
Route::get('/employees', [EmployeeController::class, 'index']); 
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);  

Route::post('/employees', [EmployeeController::class, 'store']); 
Route::put('/employees/{employee}', [EmployeeController::class, 'update']); 
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']); 

//*====  PLACES ROUTES  ====*//
Route::get('/places', [PlaceController::class, 'index']); 
Route::get('/places/{place}', [PlaceController::class, 'show']);  

Route::post('/places', [PlaceController::class, 'store']); 
Route::put('/places/{place}', [PlaceController::class, 'update']); 
Route::delete('/places/{place}', [PlaceController::class, 'destroy']); 

//*====  STATUS ROUTES  ====*//
Route::get('/statuses', [StatusController::class, 'index']); 
Route::get('/statuses/{status}', [StatusController::class, 'show']);  

Route::post('/statuses', [StatusController::class, 'store']); 
Route::put('/statuses/{status}', [StatusController::class, 'update']); 
Route::delete('/statuses/{status}', [StatusController::class, 'destroy']); 

//*====  SPECIALITY ROUTES  ====*//
Route::get('/specialities', [SpecialityController::class, 'index']); 
Route::get('/specialities/{speciality}', [SpecialityController::class, 'show']);  

Route::post('/specialities', [SpecialityController::class, 'store']); 
Route::put('/specialities/{speciality}', [SpecialityController::class, 'update']); 
Route::delete('/specialities/{speciality}', [SpecialityController::class, 'destroy']); 

//*====  TYPE-SERVICIE ROUTES  ====*//
Route::get('/typesservicie', [TypeServicieController::class, 'index']); 
Route::get('/typesservicie/{typeServicie}', [TypeServicieController::class, 'show']);  

Route::post('/typesservicie', [TypeServicieController::class, 'store']); 
Route::put('/typesservicie/{typeServicie}', [TypeServicieController::class, 'update']); 
Route::delete('/typesservicie/{typeServicie}', [TypeServicieController::class, 'destroy']); 

//*====  SERVICIE ROUTES  ====*//
Route::get('/servicies', [ServicieController::class, 'index']); 
Route::get('/servicies/{servicie}', [ServicieController::class, 'show']);  

Route::post('/servicies', [ServicieController::class, 'store']); 
Route::put('/servicies/{servicie}', [ServicieController::class, 'update']); 
Route::delete('/servicies/{servicie}', [ServicieController::class, 'destroy']); 

//*====  APPOINTMENT ROUTES  ====*//
Route::get('/appointments', [AppointmentController::class, 'index']); 
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);  
Route::get('/appointments/availables', [AppointmentController::class, 'getAppointmentsAvailable']); 

Route::post('/appointments', [AppointmentController::class, 'store']); 
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']); 
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']); 

Route::get('/customer/{customer}/appointments', [AppointmentController::class, 'getAppointmentsFromCustomer']);





