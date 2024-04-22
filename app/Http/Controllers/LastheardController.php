<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lastheard;

class LastheardController extends Controller
{
    public function index()
    {
        $lastheard_count = Lastheard::count();
        return view('lastheard.index', compact('lastheard_count'));
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
        $lastheard = new Lastheard();
        $lastheard->name = $request->name;
        $lastheard->callsign = $request->callsign;
        $lastheard->email = $request->email;
        $lastheard->save();

        // Redirect dengan pesan sukses
        return redirect()->route('callsign.index')->with('success', 'Callsign added successfully');
    }

    public function list(Request $request)
    {
        $lastheards = Lastheard::orderBy('id', 'desc')->get();

        // Mengonversi koleksi model menjadi array
        $lastheardsArray = $lastheards->toArray();

        return response()->json([
            'data' => $lastheardsArray
        ]);
    }
}
