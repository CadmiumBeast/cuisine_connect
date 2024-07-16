@extends('auth.layout.layout')
@section('content')

<div class="main">
    <div class="restaurantWrapper">
        @foreach($restaurantUsers as $restaurantUser)
        
            <div class="restaurantCard">
            <a href="{{ route('Customer.resturantitems',['restaurant' =>$restaurantUser->id]) }}">
                <div class="restaurantName">
                    <h3>{{$restaurantUser->name}}</h3>
                </div>
                <div class="restaurantCuisine">
                    @foreach($allRestaurants->where('user_id', $restaurantUser->id) as $restaurant)
                        <p>{{ $restaurant->cuisine_type }}</p>
                    @endforeach
                </div>
                <div class="restaurantNumber">
                    @foreach($allRestaurants->where('user_id', $restaurantUser->id) as $restaurant)
                        <p>{{ $restaurant->contact_no }}</p>
                    @endforeach
                </div>
                </a>
            </div>
            
            <div class="restaurantCard">
            
        @endforeach

    </div>
</div>

@endsection
