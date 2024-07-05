@extends('layout.app')

@section('content')

    <div class="container my-5">

        <h3 class="text-center mb-5">Flight Masters</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-area bg-light p-4 rounded-3 shadow-sm">
                    <form method="POST" action="{{ route('flightmaster.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-plane-departure me-2"></i>Departure City</label>
                                <input type="text" class="form-control" name="DepartureCity" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-plane-arrival me-2"></i>Arrival City</label>
                                <input type="text" class="form-control" name="ArrivalCity" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-clock me-2"></i>Departure Time</label>
                                <input type="time" class="form-control" name="DepartureTime" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-clock me-2"></i>Arrival Time</label>
                                <input type="time" class="form-control" name="ArrivalTime" required>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-save me-2"></i>Register</button>
                        </div>
                    </form>
                </div>

                <table class="table table-striped mt-5">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Departure City</th>
                            <th scope="col">Arrival City</th>
                            <th scope="col">Departure Time</th>
                            <th scope="col">Arrival Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $flightmasters as $key => $flightmaster )
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $flightmaster->DepartureCity }}</td>
                            <td>{{ $flightmaster->ArrivalCity }}</td>
                            <td>{{ $flightmaster->DepartureTime }}</td>
                            <td>{{ $flightmaster->ArrivalTime }}</td>
                            <td>
                                <a href="{{ route('flightmaster.edit', $flightmaster->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>
                                <form action="{{ route('flightmaster.destroy', $flightmaster->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .form-label i {
            color: #0d6efd;
        }
        .btn-info {
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-info:hover {
            background-color: #31d2f2;
            border-color: #31d2f2;
        }
        .btn-primary i, .btn-danger i {
            margin-right: 5px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
@endpush
