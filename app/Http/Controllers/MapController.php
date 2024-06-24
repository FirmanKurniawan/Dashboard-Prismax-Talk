<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\Trigger;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index');
    }

    public function getGPS(Request $request)
    {
        if ($request->device == 1){
            Trigger::where('id', 1)
               ->update(['status' => 'GPS;1fd7ce38']);
            
            // Path ke script Python Anda
            // $pythonScriptPath = "C:\\Users\\Busdev\\Documents\\Magnet\\get_receive_gps1.py";
        
            // Jalankan script Python secara sinkronous dan simpan outputnya
            // $output = shell_exec("python " . $pythonScriptPath);
        } elseif ($request->device == 2){
            // Path ke script Python Anda
            $pythonScriptPath = "C:\\Users\\Busdev\\Documents\\Magnet\\get_receive_gps2.py";
        
            // Jalankan script Python secara sinkronous dan simpan outputnya
            $output = shell_exec("python " . $pythonScriptPath);
        } elseif ($request->device == 3){
            // Path ke script Python Anda
            $pythonScriptPath = "C:\\Users\\Busdev\\Documents\\Magnet\\get_receive_gps3.py";
        
            // Jalankan script Python secara sinkronous dan simpan outputnya
            $output = shell_exec("python " . $pythonScriptPath);
        }
        
        return redirect()->route('map.index');
    }

    public function getMap()
    {
        // Query untuk mengambil data dari tabel users
        $mapsData = Map::select('id_dmr', 'name', 'latitude', 'longitude')->get();

        // Ubah struktur data agar sesuai dengan yang diinginkan
        $maps = [];
        foreach ($mapsData as $map) {
            $maps[] = [
                'id_dmr' => $map->id_dmr,
                'name' => $map->name,
                'location' => [$map->latitude, $map->longitude]
            ];
        }

        // Mengembalikan data dalam bentuk JSON
        return response()->json($maps);
    }

    public function requestGPS(Request $request)
    {
        // Memisahkan data berdasarkan tanda ";"
        $split_data = explode(';', $request->data);

        // Memastikan jumlah elemen sesuai dengan format yang diharapkan
        if (count($split_data) != 11) {
            return "error";
        }

        // Menetapkan variabel sesuai dengan data yang diekstrak
        $id_dmr = $split_data[0];
        $latitude = $split_data[1];
        $longitude = $split_data[2];
        $speed = $split_data[3];
        $altitude = $split_data[4];
        $timestamp = $split_data[5];
        $gps_type = $split_data[6];
        $angle = $split_data[7];
        $satellite = $split_data[8];
        $quality = $split_data[9];
        $name = $split_data[10];

        // Mencari record dengan id_dmr yang sama dan memperbarui data, atau membuat baru jika tidak ada
        $map = Map::updateOrCreate(
            ['id_dmr' => $id_dmr],
            [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'speed' => $speed,
                'altitude' => $altitude,
                'timestamp' => $timestamp,
                'gps_type' => $gps_type,
                'angle' => $angle,
                'satellite' => $satellite,
                'quality' => $quality,
                'name' => $name
            ]
        );

        // Mengembalikan respons JSON
        return "success";
    }

    public function checkStatus()
    {
        return 'success';
    }
}
