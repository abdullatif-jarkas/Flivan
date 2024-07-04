<?php

namespace App\Http\Controllers;

use App\Models\FlightMaster;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $flightmaster;
    public function __construct(){
        $this->flightmaster = new FlightMaster();
    }
    public function index() {
        $response['flightmasters'] = $this->flightmaster->all();
        return view('welcome')->with($response);
    }
}
