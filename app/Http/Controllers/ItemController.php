<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function create()
    {
        return view('item.create');

    }

    public function store(Request $request)
    {
        $user = auth()->user()->id;

        $restaurant = Restaurant::where('user_id', $user)->first();
        $restaurant_id = $restaurant->id;

        $data = $request->validate([

            'name' => ['required'],
            'price' => ['required', 'integer'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('picture');

        $picname = time().'.'.$image->extension();
        $request->picture->storeAs('public/path_images', $picname);

        Item::create([
            'user_id' => $user,
            'restaurant_id' => $restaurant_id,
            'name' => $data['name'],
            'price' => $data['price'],
            'picture' => $picname,
        ]);
        return redirect()->route('Restaurants.dashboard');
    }
    public function changeAvailability(Item $item)
    {
        $item->update([
            'Availability' => !$item->Availability
        ]);

        return redirect()->route('Restaurants.dashboard');
    }


    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'restaurant_id' => ['required', 'integer'],
            'name' => ['required'],
            'price' => ['required', 'integer'],
            'picture' => ['required'],
        ]);

        $item->update($data);

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json();
    }
}
