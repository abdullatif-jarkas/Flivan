<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightTransaction extends Model
{
    use HasFactory;
    protected $table = 'flighttransactions';
    protected $primaryKey = 'id';
    protected $fillable = [
            'seatnumber',
            'date',
            'fare',
            'passenger_id',
            'flightmasters_id',
            'aircrafts_id',
        ];
    public function passenger()
    {
        return $this->belongsTo('App\Models\Passenger', 'passenger_id', 'id');
    }
    public function flightmaster()
    {
        return $this->belongsTo('App\Models\FlightMaster', 'flightmasters_id', 'id');
    }
    public function aircraft()
    {
        return $this->belongsTo('App\Models\Aircraft', 'aircrafts_id', 'id');
    }
    public function cancellation()
    {
        return $this->hasOne('App\Models\Cancellation', 'flighttransaction_id', 'id');
    }
}
