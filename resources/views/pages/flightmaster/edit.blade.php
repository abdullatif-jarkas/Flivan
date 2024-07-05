@extends('layout.app')

@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Edit Flight Master</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white text-center">
                        Edit Flight Master Details
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('flightmaster.update', $flightmaster->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="DepartureCity" class="form-label">Departure City</label>
                                    <input type="text" class="form-control" name="DepartureCity" id="DepartureCity" value="{{ $flightmaster->DepartureCity }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="ArrivalCity" class="form-label">Arrival City</label>
                                    <input type="text" class="form-control" name="ArrivalCity" id="ArrivalCity" value="{{ $flightmaster->ArrivalCity }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="DepartureTime" class="form-label">Departure Time</label>
                                    <input type="text" class="form-control" name="DepartureTime" id="DepartureTime" value="{{ $flightmaster->DepartureTime }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="ArrivalTime" class="form-label">Arrival Time</label>
                                    <input type="text" class="form-control" name="ArrivalTime" id="ArrivalTime" value="{{ $flightmaster->ArrivalTime }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="history.back()">Go Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .card-header {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-left: 10px;
        }
    </style>
@endpush
