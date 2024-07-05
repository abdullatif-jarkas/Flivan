<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightMaster;
use App\Models\FlightTransaction;
use App\Models\Passenger;
use App\Models\Aircraft;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class FlightTransactionController extends Controller
{
    protected $flighttransactions;
    public function __construct(){
        $this->flighttransactions = new FlightTransaction();
    }
    public function index(User $user)
    {
        Gate::authorize('isAdmin', $user);
        $flighttransactions = FlightTransaction::with('passenger', 'flightmaster', 'aircraft')->get();
        $passengers = Passenger::all();
        $flightmasters = FlightMaster::all();
        $aircrafts = Aircraft::all();

        return view('pages.flighttransaction.index', compact('passengers', 'flightmasters', 'aircrafts', 'flighttransactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->flighttransactions->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightTransaction $flighttransaction)
    {
        $passengers = Passenger::all();
        $flightmasters = FlightMaster::all();
        $aircrafts = Aircraft::all();
        return view('pages.flighttransaction.edit', compact('flighttransaction', 'passengers', 'flightmasters', 'aircrafts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flighttransaction $flighttransaction)
    {
        $request->validate([
            'seatnumber' => 'required|string|max:255',
            'date' => 'required|date',
            'fare' => 'required|numeric',
            'passenger_id' => 'required|exists:passengers,id',
            'flightmasters_id' => 'required|exists:flightmasters,id',
            'aircrafts_id' => 'required|exists:aircrafts,id',
        ]);

        $flighttransaction->update($request->all());

        return redirect()->route('flighttransaction.index')->with('success', 'Flight transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flighttransaction = $this->flighttransactions->find($id);
        $flighttransaction->delete();
        return redirect('flighttransaction');
    }
}
