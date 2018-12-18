@extends('layouts.master')

@section('title')
    Waddell - Project 4: The Low-Nickel Diet Tracker
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
            </div>
            <div class="col-6">
                <h1>{{ config('app.name') }}</h1>
                <p>This tracker relies on a nickel points system developed by Mona Mislanker, BS and Matthew J. Zirwas, MD (DERMATITIS, vol 24, July/August, 2013). Each food is assigned a points value based on how much nickel it usually contains. The goal is to stay below 15 points per day.</p>
                <h2>Edit Entry</h2>
                @foreach($foods as $food)
                    @include('modules.entry')
                @endforeach
                {{-- @if($food)
                    <div class='alert alert-primary' role='alert'>
                        <p>You ate {{ $food }} for {{ $mealForPrint }}.</p>
                        <p>{{ $food }} is x nickel points.</p>
                        <p>Nickel Points consumed today: </p>
                        <p>Daily Nickel Points remaining: </p>
                    </div>
                @endif --}}
            </div>
            <div class="col">
            </div>
        </div>
    </div>
@endsection
