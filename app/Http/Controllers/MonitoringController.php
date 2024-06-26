<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;
use App\Models\Company;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class MonitoringController extends Controller
{
    public function index()
    {
        // Dapatkan semua lisensi
        $licenses = Monitoring::all();
        $companies = Company::get();

        // Hitung jumlah lisensi
        $license_count = Monitoring::count();

        // Dapatkan lisensi yang aktif (belum kadaluarsa)
        $activeLicenses = Monitoring::where('expires_at', '>', Carbon::now())->get();

        // Dapatkan lisensi yang kadaluarsa
        $expiredLicenses = Monitoring::where('expires_at', '<=', Carbon::now())->get();

        // Dapatkan lisensi yang dibuat pada tahun ini
        $pendingLicenses = Monitoring::where('expires_at', null)->get();

        // Hitung jumlah lisensi aktif dan kadaluarsa
        $activeLicenseCount = $activeLicenses->count();
        $expiredLicenseCount = $expiredLicenses->count();
        $pendingLicensesCount = $pendingLicenses->count();

        return view('monitoring.index', compact('licenses', 'license_count', 
        'activeLicenses', 'expiredLicenses', 'activeLicenseCount', 
        'expiredLicenseCount', 'pendingLicenses', 'pendingLicensesCount', 'companies'));
    }

    public function generate(Request $request)
    {
        try {
            // Validasi request
            $validator = Validator::make($request->all(), [
                'company_id' => 'required|exists:companies,id',
                'quantity' => 'required|integer|min:1|max:1000',
                'validity_period' => 'required|integer|in:30,90,365', // Menentukan masa berlaku lisensi dalam hari (1, 7, atau 30)
            ]);

            // Jika validasi gagal, kirim respons dengan pesan kesalahan
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            // Dapatkan data perusahaan berdasarkan ID
            $company = Company::findOrFail($request->company_id);

            // Inisialisasi array untuk menyimpan lisensi
            $licenses = [];

            // Buat order untuk lisensi
            $order = Order::create([
                'company_id' => $company->id,
                'quantity' => $request->quantity,
                'price' => $request->quantity * 1000, // Harga per lisensi
            ]);

            // Loop sebanyak quantity untuk membuat lisensi
            for ($i = 0; $i < $request->quantity; $i++) {
                // Bagian acak dari lisensi
                $randomPart1 = strtoupper(substr(uniqid(), -4));
                $randomPart2 = strtoupper(substr(uniqid(), -4));
                $privateKey = "PRSMX";

                // Gabungkan private key dengan bagian acak
                $license = "PRSMX" . '-' . $randomPart1 . '-' . $randomPart2;

                // Tambahkan hash ke lisensi
                $hash = hash('sha256', $license);
                $license_key = $license . '-' . strtoupper(substr($hash, 0, 4));

                // Tentukan tanggal pembelian
                $purchase_date = now();

                // Tentukan tanggal kadaluarsa berdasarkan masa berlaku
                $valid_until = $request->validity_period;
                $expires_at = now()->addDays((int)$request->validity_period);

                // Simpan lisensi ke dalam array
                $licenses[] = Monitoring::create([
                    'company_id' => $company->id,
                    'order_id' => $order->id, // Masukkan order_id
                    'license_key' => $license_key,
                    'purchase_date' => $purchase_date,
                    'valid_until' => $valid_until,
                ]);
            }

            // Berikan respons dengan data lisensi yang baru dibuat
            return response()->json(['licenses' => $licenses], 201);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kirim respons dengan pesan kesalahan yang sesuai
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function verify(Request $request)
    {
        // Validasi request
        $request->validate([
            'license' => 'required',
            'serial_number' => 'required',
        ]);

        // Dapatkan lisensi dari request
        $license = $request->license;

        // Pisahkan bagian-bagian dari lisensi
        $parts = explode('-', $license);
        $randomParts = array_slice($parts, 1, 2); // Hanya bagian acak yang perlu diverifikasi
        $providedHash = end($parts);

        // Gabungkan bagian acak dengan private key yang baru
        $privateKey = "PRSMX";
        $licenseWithoutHash = strtoupper($privateKey) . '-' . strtoupper(implode('-', $randomParts)); // Konversi ke huruf besar

        // Hitung hash dari lisensi tanpa hash yang diberikan
        $calculatedHash = hash('sha256', $licenseWithoutHash);
        $calculatedHash = strtoupper(substr($calculatedHash, 0, 4)); // Konversi ke huruf besar

        // Periksa apakah hash yang diberikan cocok dengan hash yang dihitung
        if ($providedHash === $calculatedHash) {
            // Cari lisensi berdasarkan kunci lisensi
            $license = Monitoring::where('license_key', $request->license)->first();
            // Jika lisensi tidak ditemukan, berikan respons bahwa lisensi tidak valid
            if (!$license) {
                return response()->json(['valid' => false, 'active' => false], 200);
            } else {
                // Periksa apakah lisensi sudah diaktifkan
                if ($license->activation_at !== null) {
                    // Periksa apakah lisensi masih aktif
                    if ($license->expires_at > now()) {
                        // Periksa apakah nomor seri cocok
                        if ($license->serial_number === $request->serial_number) {
                            return "1;" . $license->serial_number . ";" . $license->expires_at;
                        } else {
                            return "2;" . "SN not match" . ";" . $license->expires_at;
                        }
                    } else {
                        return "0;" . "Expired" . ";" . $license->expires_at;
                    }
                } else {
                    // Jika lisensi belum diaktifkan, aktifkan dan atur tanggal kedaluwarsa
                    $license->serial_number = $request->serial_number; // Ganti dengan nilai yang sesuai
                    $license->activation_at = now();

                    // Ubah string $license->purchase_date menjadi objek Carbon
                    $purchaseDate = \Carbon\Carbon::parse($license->purchase_date);

                    $license->expires_at = $purchaseDate->addDays($license->valid_until);
                    $license->save();
                    return "1;" . $license->serial_number . ";" . $license->expires_at;
                }
            }
        } else {
            return "0;" . "License not found" . ";" . "1999-03-25 02:50:45"; // Lisensi tidak valid
        }
    }

    public function list(Request $request)
    {
        try {
            // Mendapatkan semua lisensi beserta nama perusahaannya
            $licenses = Monitoring::with('company')->orderBy('id', 'desc')->get();

            // Memformat data lisensi dengan nama perusahaan
            $licensesArray = $licenses->map(function ($license) {
                return [
                    'id' => $license->id,
                    'company_name' => $license->company->name_company,
                    'order_id' => $license->order_id,
                    'license_key' => $license->license_key,
                    'purchase_date' => $license->purchase_date,
                    'valid_until' => $license->valid_until,
                    'expires_at' => $license->expires_at,
                    'activation_at' => $license->activation_at,
                    'serial_number' => $license->serial_number,
                    'created_at' => $license->created_at,
                    'updated_at' => $license->updated_at
                ];
            });

            return response()->json([
                'data' => $licensesArray
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kirim respons dengan pesan kesalahan yang sesuai
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
