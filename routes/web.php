<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomobileController;
use App\Http\Controllers\CarmodelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/automobiles', [AutomobileController::class, 'index']);
Route::get('/models/{carmodel}', [CarmodelController::class, 'show']);