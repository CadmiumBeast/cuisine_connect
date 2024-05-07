@extends('auth.layout.layout')
@section('content')
<div class="main">
    <div class="restaurantDashboard">
        <div class="restaurantOption">
           <div class="profileDetails">
                <a href="{{ route('Restaurants.show',['restaurant' =>$user_id]) }}">Profile</a>
           </div>
            <div class="addItem">
                <a href="{{ route('Item.create') }}">Add Item</a>
            </div>
            <div class="deleteAccount">
                <form action="{{route('Restaurant.destroy',['restaurant' => auth()->user()->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        <div class="allItems">
            <div class="items">
                @foreach($items as $item)
                    <div class="item">
                        <div class="itemImage">
                            <img src="{{ asset('storage/path_images/'.$item->picture) }}" alt="">
                        </div>
                        <div class="itemDetail">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->price}}</p>
                            <p>@if($item->Availability == 1)
                                Available
                                @else
                                Not Available
                                @endif</p>
                            <a href="{{route('Item.changeavailability',['item' => $item])}}">Change Availability</a>

                            {{--<div class="itemButtons">
                                <a href="{{route('Item.edit',['item' => $item])}}">Edit</a>
                                <form action="{{route('Item.destroy',['item' => $item])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
