@extends('layout.app')

@section('content')

    <div class="container my-5">

        <h3 class="text-center mb-5">Passengers</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-area bg-dark text-white p-4 rounded-3 shadow-sm mb-5">
                    <form method="POST" action="{{ route('passenger.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Age</label>
                                <input type="number" class="form-control" name="age" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" aria-label="Default select example" name="gender" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Register</button>
                        </div>
                    </form>
                </div>

                <div class="card shadow-sm p-4 mb-5 bg-white rounded">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($passengers as $key => $passenger)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $passenger->name }}</td>
                            <td>{{ $passenger->age }}</td>
                            <td>{{ ucfirst($passenger->gender) }}</td>
                            <td>{{ $passenger->phone }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('passenger.edit', $passenger->id) }}" class="btn btn-sm btn-primary me-2">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <form action="{{ route('passenger.destroy', $passenger->id) }}" method="POST" style="display:inline">
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

            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area {
            background-color: #343a40; /* Dark background */
            color: #fff; /* White text */
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
@endpush
