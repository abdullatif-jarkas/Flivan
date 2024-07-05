@extends('layout.app')

@section('content')
    <div class="container my-5">

        <h3 class="text-center mb-5">Edit Passenger</h3>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-area bg-light p-4 rounded-3 shadow-sm">
                    <form method="POST" action="{{ route('passenger.update', $passenger->id) }}">
                        {!! csrf_field() !!}
                        @method('PATCH')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-user me-2"></i>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $passenger->name }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-hourglass-half me-2"></i>Age</label>
                                <input type="number" class="form-control" name="age" value="{{ $passenger->age }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa fa-venus-mars me-2"></i>Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="male" {{ $passenger->gender == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ $passenger->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa fa-phone me-2"></i>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $passenger->phone }}"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary"><i
                                        class="fa fa-save"></i>Update</button>
                                <button type="button" class="btn btn-secondary" onclick="history.back()">Go Back</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .form-area {
            background-color: #f8f9fa;
            /* Light background */
            color: #343a40;
            /* Dark text */
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-label i {
            color: #0d6efd;
            /* Icon color */
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
@endpush
