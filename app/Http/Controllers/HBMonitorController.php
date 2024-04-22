<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HBMonitorController extends Controller
{
    public function index()
    {
        return view('hbmonitor.index');
    }
}
