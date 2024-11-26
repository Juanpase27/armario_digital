<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\GarmentUsageHistoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OutfitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');
Route::resource('garments', GarmentController::class);

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::resource('garments', GarmentController::class);
    Route::resource('outfits', OutfitController::class);
    Route::resource('calendar-events', CalendarEventController::class);
    Route::resource('garment-usage-history', GarmentUsageHistoryController::class);
    Route::resource('notifications', NotificationController::class);
});

// Rutas de outfits
Route::resource('outfits', OutfitController::class);

// Rutas de eventos del calendario
Route::resource('calendar-events', CalendarEventController::class);

// Rutas de historial de uso de prendas
Route::resource('garment-usage-history', GarmentUsageHistoryController::class);

// Rutas de notificaciones
Route::resource('notifications', NotificationController::class);
