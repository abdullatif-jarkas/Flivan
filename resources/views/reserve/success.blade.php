<!-- resources/views/reserve/success.blade.php -->
@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4 animate__animated animate__bounceIn">
                            <i class="fas fa-check-circle fa-5x text-success"></i>
                        </div>
                        <div class="alert alert-success animate__animated animate__zoomIn animate__delay-1s" role="alert">
                            <h4 class="alert-heading display-5 mb-4">Reservation Submitted</h4>
                            <p class="lead">Your order has been submitted successfully. Please visit the main office to confirm your reservation.</p>
                            <hr class="my-4">
                            <p>Thank you for choosing our service! We look forward to serving you.</p>
                            <div class="d-grid gap-2 d-md-block mt-4 animate__animated animate__swing animate__delay-2s">
                                <a href="{{ route('main') }}" class="btn btn-primary btn-lg">Go to Homepage</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            background-color: #fff;
            border-radius: 1rem;
        }
        .card-body {
            padding: 3rem;
        }
        .fa-check-circle {
            margin-bottom: 1rem;
        }
        .alert-heading {
            color: #28a745;
            font-weight: bold;
        }
        .lead {
            font-size: 1.25rem;
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        hr {
            border-top: 2px solid #28a745;
        }
    </style>
@endpush
