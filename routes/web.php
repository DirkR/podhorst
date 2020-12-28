<?php

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

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('station', 'StationController');
    Route::resource('show', 'ShowController');
    Route::resource('episode', 'EpisodeController')->only(['index', 'show']);
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
