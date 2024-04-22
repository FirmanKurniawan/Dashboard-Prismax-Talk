<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lastheard extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_utc',
        'mode',
        'callsign',
        'callsign_suffix',
        'target',
        'src',
        'duration',
        'loss',
        'bit_error_rate',
        'rssi',
    ];
}
