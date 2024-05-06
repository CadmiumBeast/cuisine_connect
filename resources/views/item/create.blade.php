@extends('auth.layout.layout')
@section('content')

    <form action="{{route('Item.store')}}" method="post" class="createUserform" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control" :value="old('picture')">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Item</button>
        </div>
    </form>

@endsection
