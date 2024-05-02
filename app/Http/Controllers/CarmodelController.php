<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
    //
    
    function show(Request $request, Carmodel $carmodel)
    {
        return view('models.show', compact('carmodel'));
    }
}
