<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PistarController extends Controller
{
    public function index()
    {
        return view('pistar.index');
    }
}
