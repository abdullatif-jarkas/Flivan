@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="mb-4">{{ __('You are logged in!') }}</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/passenger') }}" class="btn btn-success w-100">{{ __('Go to Passenger') }}</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/flightmaster') }}" class="btn btn-success w-100">{{ __('Go to Flight Master') }}</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/aircraft') }}" class="btn btn-success w-100">{{ __('Go to Air Craft') }}</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ url('/flighttransaction') }}" class="btn btn-success w-100">{{ __('Go to Flight Transaction') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">
                    <a href="{{ url('/') }}" class="btn btn-primary w-100">{{ __('Go Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
