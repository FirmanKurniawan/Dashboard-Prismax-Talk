<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'quantity', 'price'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function monitorings()
    {
        return $this->hasMany(Monitoring::class);
    }
}
