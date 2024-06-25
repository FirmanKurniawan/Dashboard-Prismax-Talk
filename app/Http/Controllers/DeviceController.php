<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::count();
        return view('device.index', compact('devices'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
        ]);

        // Buat device baru
        $device = new Device();
        $device->name = $request->name;
        $device->serial_number = $request->serial_number;
        $device->priority = $request->priority;
        $device->save();

        // Redirect dengan pesan sukses
        return redirect()->route('device.index')->with('success', 'Device added successfully');
    }

    public function list(Request $request)
    {
        $devices = Device::orderBy('id', 'desc')->get();

        // Mengonversi koleksi model menjadi array
        $devicesArray = $devices->toArray();

        return response()->json([
            'data' => $devicesArray
        ]);
    }
}
