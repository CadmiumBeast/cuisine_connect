@extends('auth.dashboard.admindashboard')
@section('buttonView')
    <div class="restaurantinfo">
        <div class="restaurantinfowrapper">
        @foreach($restaurants as $restaurant)
            <div class="restaurantinfocard">
                <h3>{{$restaurant->name}}</h3>
                <p>{{$restaurant->email}}</p>
                <div class="resinfocardbut">
                    <a href="{{route('admin.editRestaurant',['restaurant' => $restaurant])}}">Edit</a>
                    <form action="{{route('Admin.destroyRestaurant', ['restaurant'=>$restaurant])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>

        @endforeach
        </div>

    </div>
@endsection
