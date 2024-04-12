<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutomobileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/automobiles', [AutomobileController::class, 'index']);