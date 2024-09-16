<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//*====  CUSTOMER ROUTES  ====*//
Route::get('/customers', [CustomerController::class, 'index']); // Get All
Route::get('/customers/{customer}', [CustomerController::class, 'show']);  // Get by ID

Route::post('/customers', [CustomerController::class, 'store']); // create
Route::put('/customers/{customer}', [CustomerController::class, 'update']); // update
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']); // delete
