@extends('auth.layout.layout')
@section('title', 'Welcome')
@section('content')
     
<div class="main">
    <div class="welcome">
        <div class="content">
            <h1>Welcome to Cuisine Connect</h1>
            <p>Connect with your favorite restaurants and order your favorite food</p>
            <a href="{{ route('register') }}">Register <span>></span></a>
        </div>
        <div class="image">
            <img src="{{ asset('images/hero_image.png') }}" alt="welcome">
        </div>
    </div>
</div>


@endsection
