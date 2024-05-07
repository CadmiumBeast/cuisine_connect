<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
    }
    public function checkout()
    {
       $user = auth()->user()->id;
         $carts = Cart::where('user_id', $user)->get();
         foreach ($carts as $cart){
                $cart->delete();
         }
         return redirect()->route('Customer.dashboard');
    }
    public function viewCart()
    {
        $user = auth()->user()->id;
        $carts = Cart::where('user_id', $user)->get();
        $items = Item::where('id', $carts->first()->item_id)->first();

        return view('cart', compact('carts','items'));
    }
    public function addToCart($item_id)
    {
        $user_id = auth()->user()->id;
        $restaurant_id = Item::where('id', $item_id)->first()->restaurant_id;
        $cart = Cart::where('item_id', $item_id)->where('restaurant_id', $restaurant_id)->where('user_id', $user_id)->first();

        if ($cart) {
            $cart->Quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'item_id' => $item_id,
                'restaurant_id' => $restaurant_id,
                'user_id' => $user_id,
                'Quantity' => 1,
            ]);
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'item_id' => ['required', 'integer'],
            'restaurant_id' => ['required', 'integer'],
            'Quantity' => ['required', 'integer'],
        ]);

        return Cart::create($data);
    }

    public function show(Cart $cart)
    {
        return $cart;
    }

    public function update(Request $request, Cart $cart)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'item_id' => ['required', 'integer'],
            'restaurant_id' => ['required', 'integer'],
            'Quantity' => ['required', 'integer'],
        ]);

        $cart->update($data);

        return $cart;
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json();
    }
}
