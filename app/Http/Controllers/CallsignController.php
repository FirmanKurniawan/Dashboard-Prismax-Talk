<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callsign;

class CallsignController extends Controller
{
    public function index()
    {
        $callsigns = Callsign::count();
        return view('callsign.index', compact('callsigns'));
    }
    
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'callsign' => 'required|string|unique:callsigns,callsign',
            'email' => 'required|string|email|max:255|unique:callsigns,email',
        ]);

        // Buat perusahaan baru
        $callsign = new Callsign();
        $callsign->name = $request->name;
        $callsign->callsign = $request->callsign;
        $callsign->email = $request->email;
        $callsign->save();

        // Redirect dengan pesan sukses
        return redirect()->route('callsign.index')->with('success', 'Callsign added successfully');
    }

    public function list(Request $request)
    {
        $callsigns = Callsign::orderBy('id', 'desc')->get();

        // Mengonversi koleksi model menjadi array
        $callsignsArray = $callsigns->toArray();

        return response()->json([
            'data' => $callsignsArray
        ]);
    }
}
