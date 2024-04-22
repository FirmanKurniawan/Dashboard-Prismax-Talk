<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'rx_tx',
        'name',
        'dmr_id_master',
        'callsign',
        'slot',
        'duration',
    ];
}
