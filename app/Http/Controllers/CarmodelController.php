<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Illuminate\Http\Request;

class CarmodelController extends Controller
{
    //
    
    function show($id)
    {
        $data = Carmodel::find($id);
        
        return view('models.show', $data);
    }
}
