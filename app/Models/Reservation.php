<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'flightmaster_id',
        'passenger_name',
        'seat_number',
    ];

    public function flightmaster()
    {
        return $this->belongsTo(Flightmaster::class);
    }
}
