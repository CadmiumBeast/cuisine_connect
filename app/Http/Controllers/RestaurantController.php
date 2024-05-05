<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'cuisine_type' => ['required'],
            'address' => ['required'],
            'contact_no' => ['required'],
        ]);

        return Restaurant::create($data);
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant;
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'cuisine_type' => ['required'],
            'address' => ['required'],
            'contact_no' => ['required'],
        ]);

        $restaurant->update($data);

        return $restaurant;
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return response()->json();
    }
}
