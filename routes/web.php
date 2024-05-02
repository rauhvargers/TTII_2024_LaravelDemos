<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomobileController;
use App\Http\Controllers\CarmodelController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/automobiles', [AutomobileController::class, 'index'])->name('automobiles.index');
Route::get('/models/{carmodel}', [CarmodelController::class, 'show'])->name('models.show');
Route::get('/models/{carmodel}/edit', [CarmodelController::class, 'edit'])->name('models.edit');
Route::put('/models/{carmodel}/update', [CarmodelController::class, 'update'])->name('models.update');