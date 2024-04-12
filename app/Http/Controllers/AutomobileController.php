<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutomobileController extends Controller
{
    function index() {
        return view('automobiles');
        //return "hello world";
    }
}
