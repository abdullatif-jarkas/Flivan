<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AircraftController extends Controller
{
    protected $aircraft;
    public function __construct(){
        $this->aircraft = new Aircraft();

    }
    public function index(User $user)
    {
        Gate::authorize('isAdmin', $user);
        $response['aircrafts'] = $this->aircraft->all();
        return view('pages.aircraft.index')->with($response);
    }

    public function store(Request $request)
    {

        $this->aircraft->create($request->all());
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $response['aircraft'] = $this->aircraft->find($id);
        return view('pages.aircraft.edit')->with($response);
    }
    public function update(Request $request, string $id)
    {
        $aircraft = $this->aircraft->find($id);
        $aircraft->update(array_merge($aircraft->toArray(), $request->toArray()));
        return redirect('aircraft');
    }
    public function destroy(string $id)
    {
        $aircraft = $this->aircraft->find($id);
        $aircraft->delete();
        return redirect('aircraft');
    }
}
