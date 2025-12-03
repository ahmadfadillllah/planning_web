<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuelmanController extends Controller
{
    //
    public function dashboard()
    {
        return view('fuelman.dashboard');
    }
}
