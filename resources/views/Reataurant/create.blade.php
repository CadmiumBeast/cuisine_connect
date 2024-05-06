@extends('auth.layout.layout')
@section('content')

    <form action="{{route(Auth::user()->type . '.storeRestaurant')}}" method="post" class="createUserform">
        @csrf
        <input type="hidden" name="user_id" value="{{ $restaurant }}">
        <div class="form-group">
            <label for="name">Cuisine Type</label>
            <input type="text" name="cuisine_type" id="cuisine_type" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" name="contact_no" id="contact_no" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Restaurant Details</button>
        </div>
    </form>
@endsection
