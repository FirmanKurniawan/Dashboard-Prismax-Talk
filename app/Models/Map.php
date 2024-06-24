<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $table = 'maps';

    protected $fillable = [
        'id_dmr',
        'name',
        'latitude',
        'longitude',
        'speed',
        'altitude',
        'timestamp',
        'gps_type',
        'angle',
        'satellite',
        'quality',
        'created_at',
        'updated_at'
    ];
}
