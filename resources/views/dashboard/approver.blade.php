@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Approver Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Reservations</div>
                    <div class="card-body">
                        <ul>
                            @foreach($reservations as $reservation)
                                <li>{{ $reservation->start_date }} - {{ $reservation->end_date }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        <p>Name: {{ auth()->user()->name }}</p>
                        <p>Email: {{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
