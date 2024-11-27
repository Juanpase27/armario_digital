<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\GarmentCategoryController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\GarmentUsageHistoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OutfitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('login', 'login')->name('login')->middleware('guest');


Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard');
    Route::resource('garments', GarmentController::class);
    Route::resource('outfits', OutfitController::class);
    Route::resource('calendar-events', CalendarEventController::class);
    Route::resource('garment-usage-history', GarmentUsageHistoryController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('garment_categories', GarmentCategoryController::class);
});
