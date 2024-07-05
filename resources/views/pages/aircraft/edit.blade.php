@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Edit Aircraft</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Edit Aircraft Details
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aircraft.update', $aircraft->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="aircraftnumber" class="form-label">Aircraft Number</label>
                                    <input type="text" class="form-control" name="aircraftnumber" id="aircraftnumber" value="{{ $aircraft->aircraftnumber }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" value="{{ $aircraft->model }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $aircraft->description }}</textarea>
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
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: #e3f2fd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .card-header {
            font-size: 1.25rem;
            font-weight: 500;
        }
    </style>
@endpush
