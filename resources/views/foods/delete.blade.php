@extends('layouts.master')

@section('title')
    Confirm Deletion
@endsection

@section('content')
    <h2>Confirm Deletion</h2>

    <p>Are you sure you want to delete your entry for <strong>{{ $food->food }}</strong> on <strong>{{ $food->date }}</strong>?</p>

    <form method='POST' action='/foods/{{ $food->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/foods'>Never mind. I don't want to delete it.</a>
    </p>

@endsection