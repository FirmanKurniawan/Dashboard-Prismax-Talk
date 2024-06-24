<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trigger;

class TriggerController extends Controller
{
    public function checkStatus()
    {
        // Query untuk mengambil data dari tabel triggers
        $trigger = Trigger::select('status')->first();
        return $trigger->status;  
    }

    public function callbackStatus()
    {
        // Query untuk mengupdate data pada tabel triggers
        Trigger::where('id', 1)
            ->update(['status' => 'waiting']);

        return "waiting";
    }
}
