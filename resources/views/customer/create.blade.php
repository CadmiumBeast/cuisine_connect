@extends('auth.layout.layout')
@section('content')

    <form action="{{route(Auth::user()->type . '.storeCustomer')}}" method="post" class="createUserform">
        @csrf
        <input type="hidden" name="user_id" value="{{ $customer }}">
        <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" name="Contact_no" id="Contact_no" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Address</label>
            <input type="text" name="Address" id="Address" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Customer Details</button>
        </div>
    </form>
@endsection
