<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;
    protected $table = 'aircrafts';
    protected $primaryKey = 'id';
    protected $fillable = [
            'aircraftnumber',
            'model',
            'description'
        ];
    public function flighttransactions(){
        return $this->hasMany('App\Models\FlightTransaction', 'aircraft_id');
    }
}
