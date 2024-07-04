<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{

    protected $passenger;
    public function __construct(){
        $this->passenger = new Passenger();
    }
    public function index()
    {
        $response['passengers'] = $this->passenger->all();
        return view('pages.passenger.index')->with($response);
    }

    public function store(Request $request)
    {

        $this->passenger->create($request->all());
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $response['passenger'] = $this->passenger->find($id);
        return view('pages.passenger.edit')->with($response);
    }
    public function update(Request $request, string $id)
    {
        $passenger = $this->passenger->find($id);
        $passenger->update(array_merge($passenger->toArray(), $request->toArray()));
        return redirect('passenger');
    }
    public function destroy(string $id)
    {
        $passenger = $this->passenger->find($id);
        $passenger->delete();
        return redirect('passenger');
    }
}
