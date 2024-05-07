@extends('auth.layout.layout')
@section('content')
<div class="main">
    <div class="cartWrapper">
        <h3>Cart</h3>
        <div class="cartItems">

            @foreach($carts as $cartItem)
                <div class="cartItem">
                    <div class="cartItemDetails">
                        <h3>{{$items->name}}</h3>
                        <p>Rs. {{$items->price}}</p>
                    </div>
                    <div class="cartItemQuantity">
                        <p>Quantity: {{$cartItem->Quantity}}</p>
                    </div>
                    <div class="cartItemTotal">
                        <p>Total: Rs. {{$cartItem->Quantity * $items->price}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{--<div class="cartTotal">
            <h3>Total: Rs. {{$total}}</h3>
        </div>--}}
        <div class="cartCheckout">
            <form action="{{route('Customer.checkout')}}" method="Get">
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        </div>
    </div>
</div>


@endsection
