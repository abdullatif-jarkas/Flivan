<?php

namespace App\Http\Controllers;

use App\Models\Cancellation;
use App\Models\FlightTransaction;
use Illuminate\Http\Request;

class CancellationController extends Controller
{
    protected $cancellation;
    public function __construct(){
        $this->cancellation = new Cancellation();
    }
    public function index()
    {
        $cancellations = Cancellation::with('flighttransactions', 'cancellations')->get();
        $flighttransactions = FlightTransaction::all();
        return view('pages.cancellation.index', compact('cancellations', 'flighttransactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->cancellation->create($request->all());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
