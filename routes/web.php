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
use App\Http\Controllers\PodcastFeedController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('station', 'StationController');
    Route::resource('show', 'ShowController');
    Route::resource('episode', 'EpisodeController')->only(['index', 'show']);
});

Route::name('feed.')->group(function () {
    Route::get('feed', [PodcastFeedController::class, 'allFeed'])->name('all');
    Route::get('{station}/feed', [PodcastFeedController::class, 'stationFeed'])->name('station');
    Route::get('{station}/{show}/feed', [PodcastFeedController::class, 'showFeed'])->name('show');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('upcoming', [DashboardController::class, 'upcoming'])->name('upcoming');
});
