<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\CancellationController;
use App\Http\Controllers\FlightMasterController;
use App\Http\Controllers\FlightTransactionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', [MainController::class, 'index'])->name('main');


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::resource("/passenger", PassengerController::class);
    Route::resource("/flightmaster", FlightMasterController::class);
    Route::resource("/aircraft", AircraftController::class);
    Route::resource("/flighttransaction", FlightTransactionController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('reserve/create/{flightmaster}', [ReservationController::class, 'create'])->name('reserve.create');
Route::post('reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('reserve/success', [ReservationController::class, 'success'])->name('reserve.success');
