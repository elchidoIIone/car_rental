<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoyaltyLevelController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;




Route::resource('users', UserController::class);
Route::resource('rentals', RentalController::class);
Route::resource('payments', PaymentController::class);
Route::resource('loyalty-levels', Loyalty_levelController::class);
Route::resource('drivers', DriverController::class);
Route::resource('cars', CarController::class);
Route::resource('brands', BrandController::class);
