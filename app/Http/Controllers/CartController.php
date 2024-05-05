<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
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
