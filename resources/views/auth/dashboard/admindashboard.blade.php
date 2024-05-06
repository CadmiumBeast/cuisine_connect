@extends('auth.layout.layout')
@section('title', 'Admin Dashboard')
@section('content')

<div class="main">
    <div class="adminOptions">
        <div class="viewResturants">
            <a href="{{ route('Admin.viewRestaurants') }}">View Restaurants</a>
        </div>
        <div class="viewUsers">
            <a href="{{ route('Admin.viewUsers') }}">View Users</a>
        </div>
    </div>


    <div class="buttonView">
        @yield('buttonView')
    </div>


</div>
@endsection
