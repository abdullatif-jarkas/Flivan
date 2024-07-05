<!-- resources/views/reserve/create.blade.php -->
@extends('layout.app')

@section('content')
    <div class="container my-5">
        <h3 class="text-center mb-5">Reserve Flight</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4 mb-5 bg-white rounded">
                    <form method="POST" action="{{ route('reserve.store') }}">
                        @csrf
                        <input type="hidden" name="flightmaster_id" value="{{ $flightmaster->id }}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Passenger Name</label>
                                <input type="text" class="form-control" name="passenger_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Seat Number</label>
                                <input type="text" class="form-control" name="seat_number" required>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Reserve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
