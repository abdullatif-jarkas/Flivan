<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightMaster extends Model
{
    use HasFactory;
    protected $table = 'flightmasters';
    protected $primaryKey = 'id';
    protected $fillable = [
            'DepartureCity',
            'ArrivalCity',
            'DepartureTime',
            'ArrivalTime',
        ];
    public function flighttransactions(){
        return $this->hasMany('App\Models\FlightTransaction', 'flightmaster_id');
    }
}
