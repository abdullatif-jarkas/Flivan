{{-- index.blade.php file --}}
@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Flight Cancellation</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('cancellation.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-md-6">
                            <label>Flight Transaction ID</label>
                            <select name="flighttransaction_id" id="" class="form-control">
                                <option value="">Select Flight Transaction ID</option>
                                @foreach($flighttransactions as $flighttransaction)
                                    <option value="{{$flighttransaction->id}}">{{$flighttransaction->id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Cancel The Booking">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Flight Transaction ID</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ( $cancellations as $key => $cancellation )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $cancellation->date }}</td>
                            <td scope="col">{{ $cancellation->flighttransaction_id}}</td>
                            <td scope="col">

                            <a href="{{  route('cancellation.edit', $cancellation->id) }}">
                                <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form action="{{ route('cancellation.destroy', $cancellation->id) }}" method="POST" style ="display:inline">
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
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#FFFF00;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
