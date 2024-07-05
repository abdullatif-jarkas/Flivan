@extends('layout.app')

@section('content')

    <div class="container my-5">

        <h3 class="text-center mb-5">Flight Transaction</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm p-4 mb-5 bg-white rounded">
                    <form method="POST" action="{{ route('flighttransaction.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Seat Number</label>
                                <input type="text" class="form-control" name="seatnumber" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fare</label>
                                <input type="number" class="form-control" name="fare" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Passenger Name</label>
                                <select name="passenger_id" class="form-select" required>
                                    <option value="" disabled selected>Select Passenger</option>
                                    @foreach($passengers as $passenger)
                                    <option value="{{$passenger->id}}">{{$passenger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Flightmaster</label>
                                <select name="flightmasters_id" class="form-select" required>
                                    <option value="" disabled selected>Select Flightmaster</option>
                                    @foreach($flightmasters as $flightmaster)
                                    <option value="{{$flightmaster->id}}">{{$flightmaster->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Aircraft</label>
                                <select name="aircrafts_id" class="form-select" required>
                                    <option value="" disabled selected>Select Aircraft</option>
                                    @foreach($aircrafts as $aircraft)
                                    <option value="{{$aircraft->id}}">{{$aircraft->aircraftnumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>

                <div class="card shadow-sm p-4 mb-3 bg-white rounded">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Seat Number</th>
                            <th>Date</th>
                            <th>Fare</th>
                            <th>Passenger</th>
                            <th>Flightmaster</th>
                            <th>Aircraft</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($flighttransactions as $key => $flighttransaction)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $flighttransaction->seatnumber }}</td>
                            <td>{{ $flighttransaction->date }}</td>
                            <td>{{ $flighttransaction->fare }}</td>
                            <td>{{ $flighttransaction->passenger->name }}</td>
                            <td>{{ $flighttransaction->flightmaster->id }}</td>
                            <td>{{ $flighttransaction->aircraft->aircraftnumber }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('flighttransaction.edit', $flighttransaction->id) }}" class="btn btn-sm btn-primary me-2">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <form action="{{ route('flighttransaction.destroy', $flighttransaction->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .card {
            margin-top: 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
@endpush
