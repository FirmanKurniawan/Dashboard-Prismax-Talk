<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callsign;
use App\Models\Master;
use App\Models\Lastheard;
use App\Models\Live;

class ReportController extends Controller
{
    public function index()
    {
        $callsign_count = Callsign::count();
        $master_count = Master::count();
        $lastheard_count = Lastheard::count();

        $lives = $this->getDataByNames();
        $startCount = $this->getStartCount($lives);
        $lives['start_count'] = $startCount;
        $live_count = $lives['start_count'];

        $masters = Master::all();
        $callsigns = Callsign::all();
        return view('reports.index', compact('callsign_count', 'master_count', 'lastheard_count', 'live_count', 'masters', 'callsigns'));
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

    public function getStartCount($data)
    {
        $startCount = 0;

        // Iterasi melalui semua data
        foreach ($data as $masterData) {
            foreach ($masterData as $slotData) {
                if ($slotData && isset($slotData['status']) && $slotData['status'] === 'START') {
                    $startCount++;
                }
            }
        }

        return $startCount;
    }

    public function master(Request $request)
    {
        $masters = Master::orderBy('id', 'asc')->get();

        // Mengonversi koleksi model menjadi array
        $mastersArray = $masters->toArray();

        return response()->json([
            'data' => $mastersArray
        ]);
    }
}
