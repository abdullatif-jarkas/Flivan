<?php

namespace App\Http\Controllers;

use App\Models\Flightmaster;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Flightmaster $flightmaster)
    {
        return view('reserve.create', compact('flightmaster'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flightmaster_id' => 'required|exists:flightmasters,id',
            'passenger_name' => 'required|string|max:255',
            'seat_number' => 'required|string|max:255',
        ]);

        Reservation::create([
            'flightmaster_id' => $request->flightmaster_id,
            'passenger_name' => $request->passenger_name,
            'seat_number' => $request->seat_number,
        ]);

        return redirect()->route('reserve.success');
    }

    public function success()
    {
        return view('reserve.success');
    }
}
