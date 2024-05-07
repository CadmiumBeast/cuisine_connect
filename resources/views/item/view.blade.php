@extends('auth.layout.layout')
@section('content')
    <div class="main">
        @foreach($items as $item)
            @if($item->Availability == "1")
                <div class="itemWrapper">
                    <div>
                        <img src="{{ asset('storage/path_images/'.$item->picture) }}" alt="">
                    </div>
                    <div class="itemDetails">
                        <h3>{{$item->name}}</h3>
                        <p>Rs. {{$item->price}}</p>
                        <form action="{{route('Customer.addToCart',['item' => $item])}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endif

        @endforeach
    </div>


@endsection
