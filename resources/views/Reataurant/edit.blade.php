@extends('auth.layout.layout')
@section('content')

    <form action="{{route(Auth::user()->type . '.updateRestaurant',['restaurant'=>$restaurant_det])}}" method="post" class="editUserform">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $restaurant_det -> user_id }}">
        <div class="form-group">
            <label for="name">Cuisine Type</label>
            <input type="text" name="cuisine_type" id="cuisine_type" class="form-control" value="{{ $restaurant_det ->cuisine_type}}">
        </div>
        <div class="form-group">
            <label for="name">Contact No</label>
            <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{$restaurant_det ->contact_no}}">
        </div>
        <div class="form-group">
            <label for="price">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{$restaurant_det -> address}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Restaurant</button>
        </div>
    </form>
@endsection
