@extends('layout.app')

@section('content')
    <div class="container my-5">
        <h3 class="text-center mb-5">Edit Flight Transaction</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4 mb-5 bg-white rounded">
                    <form method="POST" action="{{ route('flighttransaction.update', $flighttransaction->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Seat Number</label>
                                <input type="text" class="form-control" name="seatnumber" value="{{ $flighttransaction->seatnumber }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" value="{{ $flighttransaction->date }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fare</label>
                                <input type="number" class="form-control" name="fare" value="{{ $flighttransaction->fare }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Passenger Name</label>
                                <select name="passenger_id" class="form-select" required>
                                    <option value="" disabled>Select Passenger</option>
                                    @foreach($passengers as $passenger)
                                        <option value="{{ $passenger->id }}" {{ $flighttransaction->passenger_id == $passenger->id ? 'selected' : '' }}>{{ $passenger->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Flightmaster</label>
                                <select name="flightmasters_id" class="form-select" required>
                                    <option value="" disabled>Select Flightmaster</option>
                                    @foreach($flightmasters as $flightmaster)
                                        <option value="{{ $flightmaster->id }}" {{ $flighttransaction->flightmasters_id == $flightmaster->id ? 'selected' : '' }}>{{ $flightmaster->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Aircraft</label>
                                <select name="aircrafts_id" class="form-select" required>
                                    <option value="" disabled>Select Aircraft</option>
                                    @foreach($aircrafts as $aircraft)
                                        <option value="{{ $aircraft->id }}" {{ $flighttransaction->aircrafts_id == $aircraft->id ? 'selected' : '' }}>{{ $aircraft->aircraftnumber }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col text-center mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" onclick="history.back()">Go Back</button>
                        </div>
                    </form>
                </div>
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
