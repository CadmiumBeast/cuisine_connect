@extends('auth.dashboard.admindashboard')
@section('buttonView')
    <div class="restaurantinfo">
        <div class="restaurantinfowrapper">
        @foreach($restaurants as $restaurant)
            <div class="restaurantinfocard">
                <h3>{{$restaurant->name}}</h3>
                <p>{{$restaurant->email}}</p>
                <div class="resinfocardbut">
                    <a >Edit</a>
                    <a >Delete</a>
                </div>
            </div>

        @endforeach
        </div>

    </div>
@endsection
