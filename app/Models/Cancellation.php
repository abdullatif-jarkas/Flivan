<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    use HasFactory;
    protected $table = 'cancellations';
    protected $primaryKey = 'id';
    protected $fillable = [
            'date',
            'flighttransaction_id',
        ];
    public function flighttransactions(){
        return $this->belongsTo('App\Models\FlightTransaction', 'flighttransaction_id', 'id');
    }
}
