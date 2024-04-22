<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Live;
use App\Models\Lastheard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index()
    {
        $masters = Master::all();
        $master_count = Master::count();

        // Ambil data "live" berdasarkan nama master
        $lives = $this->getDataByNames();

        // Tambahkan data "live" ke setiap objek $master
        foreach ($masters as $master) {
            $masterData = $lives[$master->name] ?? null;
            $master->live_data = $masterData;
        }

        return view('master.index', compact('masters', 'master_count'));
    }

    public function api_live_data()
    {
        $lives = $this->getDataByNames();

        return response()->json($lives);
    }

    public function getDataByNames()
    {
        // Ambil semua nama unik dari tabel masters
        $masterNames = Master::pluck('name')->toArray();

        // Buat array kosong untuk menyimpan hasil
        $dataByNames = [];

        // Iterasi melalui setiap nama master
        foreach ($masterNames as $name) {
            // Ambil data terakhir untuk setiap slot dari nama master ini dalam tabel live
            $latestSlotData = Live::where('name', $name)
                ->whereIn('slot', [1, 2])
                ->orderByDesc('id') // Sort by id descending
                ->get();

            // Buat array kosong untuk menyimpan detail dari masing-masing slot
            $slotData = [
                1 => null,
                2 => null,
            ];

            // Iterasi melalui data terakhir untuk nama master ini
            foreach ($latestSlotData as $data) {
                // Cek apakah slot ini memiliki data sebelumnya
                if (!$slotData[$data->slot]) {
                    // Jika tidak ada data sebelumnya, gunakan data ini
                    $slotData[$data->slot] = [
                        'status' => $data->status,
                        'rx_tx' => $data->rx_tx,
                        'dmr_id_master' => $data->dmr_id_master,
                        'callsign' => $data->callsign,
                        'slot' => $data->slot,
                        'duration' => $data->duration,
                    ];
                }
            }

            // Simpan detail slotData untuk nama master ini ke dalam array dataByNames
            $dataByNames[$name] = $slotData;
        }

        return $dataByNames;
    }

    public function lastheard(Request $request)
    {
        // Mendapatkan tanggal hari ini
        $today = Carbon::today();

        // Mengambil data terakhir dari tabel Lastheard berdasarkan hari ini
        $lastheards = Lastheard::select('callsign', 'time_utc', 'mode', 'callsign_suffix', 'target', 'src', 'duration', 'loss', 'bit_error_rate', 'rssi')
                                ->whereDate('time_utc', $today)
                                ->orderBy('id', 'desc')
                                ->take(10)
                                ->get();

        // Menghitung total_duration berdasarkan callsign
        $totalDurationByCallsign = Lastheard::select('callsign', DB::raw('SUM(duration) as total_duration'))
                                            ->whereDate('time_utc', $today)
                                            ->groupBy('callsign')
                                            ->pluck('total_duration', 'callsign');

        // Mengonversi koleksi model menjadi array
        $lastheardsArray = $lastheards->unique('callsign')->toArray();

        // Menambahkan total_duration ke setiap entri dalam array data
        foreach ($lastheardsArray as &$data) {
            $callsign = $data['callsign'];
            $totalDurationInSeconds = isset($totalDurationByCallsign[$callsign]) ? $totalDurationByCallsign[$callsign] : 0;
            // Konversi total duration dari detik menjadi menit
            $data['total_duration'] = round($totalDurationInSeconds / 60, 2); // Pembulatan hingga 2 desimal
        }

        return response()->json([
            'data' => $lastheardsArray
        ]);
    }
}
