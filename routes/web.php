<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use Laravel\Prompts\Table;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('points', PointsController::class);
route::resource('polygons', PolygonsController::class);
route::resource('polylines', PolylinesController::class);

route::get('/table', [TableController::class, 'index'])->name('table');
route::get('/map', [PointsController::class, 'index'])
->middleware(['auth', 'verified'])
->name('map');

require __DIR__.'/auth.php';
