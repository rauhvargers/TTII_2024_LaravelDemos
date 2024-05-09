<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarmodelController;
use App\Http\Controllers\AutomobileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/automobiles', [AutomobileController::class, 'index'])->name('automobiles.index');
Route::get('/models/{carmodel}', [CarmodelController::class, 'show'])->name('models.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/models/{carmodel}/edit', [CarmodelController::class, 'edit'])->name('models.edit');
    Route::put('/models/{carmodel}/update', [CarmodelController::class, 'update'])->name('models.update');
});

require __DIR__.'/auth.php';
