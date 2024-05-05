<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'integer'],
            'restaurant_id' => ['required', 'integer'],
            'name' => ['required'],
            'price' => ['required', 'integer'],
            'picture' => ['required'],
        ]);

        return Item::create($data);
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
