<?php

namespace App\Http\Controllers;

use App\Models\Carmodel;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Session;

class CarmodelController extends Controller
{
    //

    function show(Request $request, Carmodel $carmodel)
    {
        return view('models.show', compact('carmodel'));
    }

    function edit(Request $request, Carmodel $carmodel)
    {
        $manufacturers = Manufacturer::all();
        return view('models.edit', compact('carmodel', 'manufacturers'));
    }

    function update(Request $request, Carmodel $carmodel)
    {
        $validated_input = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'manufacturer_id' => 'required'
        ]);
        $carmodel->title = $request->input('title');
        $carmodel->manufacturer_id = $request->input('manufacturer_id');
        $carmodel->update();
        
        Session::flash('message', 'Successfully updated car model ' . $carmodel->title);
        
        return redirect()->route('models.show', $carmodel);
    }
}
