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
                <p>This tracker relies on a nickel points system developed by Mona Mislanker, BS and Matthew J. Zirwas, MD (DERMATITIS, vol 24, July/August, 2013). Each food is assigned a points value based on how much nickel it usually contains. Use the tracker below to stay below 15 points per day. Simply log your food as you eat throughout the day, and you'll know exactly where you stand.</p>
                <form method='GET' action='/trackProcess'>
    {{-- {{ csrf_field() }} --}}
                    <label>Category of food:
                        <input type='text' name='category' value='{{ old('category', $category) }}'>
                    </label>
                    @if($errors->get('category'))
                        <div class='error'>{{ $errors->first('category') }}</div>
                    @endif
                    <label>Food:
                        <input type='text' name='food' value='{{ old('food', $food) }}'>
                    </label>
                    @if($errors->get('food'))
                        <div class='error'>{{ $errors->first('food') }}</div>
                    @endif
                <!--
                    Code for retaining the radio checked for the form from Stack Overflow: https://stackoverflow.com/a/51192546
                    -->
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='breakfast'
                                {{ (old('meal', $meal) == 'breakfast') ? 'checked' : '' }}> Breakfast</label>
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='lunch' {{(old('meal', $meal) == 'lunch') ? 'checked' : ''}}> Lunch</label>
                    @if($errors->get('cadence'))
                        <div class='error'>{{ $errors->first('meal') }}</div>
                    @endif
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='dinner' {{(old('meal', $meal) == 'dinner') ? 'checked' : ''}}> Dinner</label>
                    @if($errors->get('cadence'))
                        <div class='error'>{{ $errors->first('meal') }}</div>
                    @endif
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='snack' {{(old('meal', $meal) == 'snack') ? 'checked' : ''}}> Snack</label>
                    @if($errors->get('cadence'))
                        <div class='error'>{{ $errors->first('meal') }}</div>
                    @endif
                    <label>Date:
                        <input type="date"
                               id="date"
                               name="date"
                               value='{{ old('date', $date) }}'>
                    </label>
                    @if($errors->get('date'))
                        <div class='error'>{{ $errors->first('date') }}</div>
                    @endif
                    <input type='submit' value='Add Food To Tracker'>
                </form>
                @if(count($errors) > 0)
                    <ul class='alert alert-danger'>
                        Please correct the errors above.
                    </ul>
                @endif
                @if($food)
                    <div class='alert alert-primary' role='alert'>
                        <p>You ate {{ $food }} for {{ $mealForPrint }}.</p>
                        <p>{{ $food }} is x nickel points.</p>
                        <p>Nickel Points consumed today: </p>
                        <p>Daily Nickel Points remaining: </p>
                    </div>
                @endif
            </div>
            <div class="col">
            </div>
        </div>
    </div>
@endsection
