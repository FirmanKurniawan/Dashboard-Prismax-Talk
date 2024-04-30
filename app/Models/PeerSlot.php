<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerSlot extends Model
{
    use HasFactory;

    public function peer()
    {
        return $this->belongsTo(Peer::class);
    }
}
