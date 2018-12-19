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
                <p>This tracker relies on a nickel points system developed by Mona Mislanker, BS and Matthew J. Zirwas, MD (DERMATITIS, vol 24, July/August, 2013). Each food is assigned a points value based on how much nickel it usually contains. The goal is to stay below 15 points per day.</p>
                <h2>Edit Entry</h2>
                <form method='POST' action='/foods/{{ $food->id }}'>
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <label>Category of food:
                        <input type='text' name='category' value='{{ old('category', $food->category) }}'>
                    </label>
                    @if($errors->get('category'))
                        <div class='error'>{{ $errors->first('category') }}</div>
                    @endif
                    <label>Food:
                        <input type='text' name='food' value='{{ old('food', $food->food) }}'>
                    </label>
                    @if($errors->get('food'))
                        <div class='error'>{{ $errors->first('food') }}</div>
                    @endif
                    <label>Servings:
                        <input type='text' name='servings' value='{{ old('servings', $food->servings) }}'>
                    </label>
                    @if($errors->get('servings'))
                        <div class='error'>{{ $errors->first('servings') }}</div>
                    @endif
                <!--
                    Code for retaining the radio checked for the form from Stack Overflow: https://stackoverflow.com/a/51192546
                    -->
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='breakfast'
                                {{ (old('meal', $food->meal) == 'breakfast') ? 'checked' : '' }}> Breakfast</label>
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='lunch' {{(old('meal', $food->meal) == 'lunch') ? 'checked' : ''}}> Lunch</label>
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='dinner' {{(old('meal', $food->meal) == 'dinner') ? 'checked' : ''}}> Dinner</label>
                    <label class='radio'><input type='radio'
                                                name='meal'
                                                value='snack' {{(old('meal', $food->meal) == 'snack') ? 'checked' : ''}}> Snack</label>
                    @if($errors->get('meal'))
                        <div class='error'>{{ $errors->first('meal') }}</div>
                    @endif
                    <label>Date:
                        <input type="date"
                               id="date"
                               name="date"
                               value='{{ old('date', $food->date) }}'>
                    </label>
                    @if($errors->get('date'))
                        <div class='error'>{{ $errors->first('date') }}</div>
                    @endif
                    <input type='submit' value='Update Food Entry'>
                </form>
                @if(count($errors) > 0)
                    <ul class='alert alert-danger'>
                        Please correct the errors above.
                    </ul>
                @endif
            </div>
            <div class="col">
            </div>
        </div>
    </div>
@endsection
