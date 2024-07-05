{{-- index.blade.php file --}}
@extends('layout.app')

@section('content')

    <div class="container">
        <h3 align="center" class="mt-5">Aircraft</h3>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        Register Aircraft
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aircraft.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="aircraftnumber" class="form-label">Aircraft Number</label>
                                    <input type="text" class="form-control" name="aircraftnumber" id="aircraftnumber" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        Aircraft List
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Aircraft Number</th>
                                <th scope="col">Model</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($aircrafts as $key => $aircraft)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $aircraft->aircraftnumber }}</td>
                                        <td>{{ $aircraft->model }}</td>
                                        <td>{{ $aircraft->description }}</td>
                                        <td>
                                            <a href="{{ route('aircraft.edit', $aircraft->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <form action="{{ route('aircraft.destroy', $aircraft->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                <button type="button" class="btn btn-secondary my-3" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .card-header {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
@endpush
