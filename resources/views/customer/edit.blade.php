@extends('auth.layout.layout')
@section('content')

    <form action="{{route(Auth::user()->type . '.updateCustomer',['customer'=>$user_id])}}" method="post" class="editUserform">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $user_id->user_id }}">
        <div class="form-group">
            <label for="name">Contact No</label>
            <input type="text" name="Contact_no" id="Contact_no" class="form-control" value="{{$user_id -> Contact_no}}">
        </div>
        <div class="form-group">
            <label for="price">Address</label>
            <input type="text" name="Address" id="Address" class="form-control" value="{{$user_id ->Address}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Customer</button>
        </div>
    </form>
@endsection
