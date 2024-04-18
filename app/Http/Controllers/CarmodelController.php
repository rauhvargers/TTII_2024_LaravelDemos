<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
    //
    
    function show($id)
    {
        $carModel = Carmodel::with('cars')->find($id);

        return view('models.show', compact('carModel'));
    }
}
