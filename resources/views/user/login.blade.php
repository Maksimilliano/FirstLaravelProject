@extends('layouts.layout')

@section('title') @parent::Login @endsection

@section('header')
    @parent
@endsection

@section('content')

    <div class="container">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button class="btn btn-primary" type="submit">Send</button>
        </form>
    </div>

@endsection

