<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::all();
    }
    public  function create($restaurant)
    {
        return view('Reataurant.create', compact('restaurant'));
    }
    public function editRestaurant($restaurant, Restaurant $restaurantd)
    {
        $restaurant_det = Restaurant::where('user_id', $restaurant)->first();

        if (!$restaurant_det) {
            $authenticatedUser = auth()->user();

            // Generate the route name dynamically based on the user type
            $routeName = $authenticatedUser->type . '.createRestaurant';
            // Redirect to the dynamically generated route
            return redirect()->route($routeName, ['restaurant' => $restaurant]);
        }

        return view('Reataurant.edit', compact('restaurant_det'));
    }


    public function store(Request $request)
    {


        $data = $request->validate([
            'user_id' => [''],
            'cuisine_type' => ['required'],
            'address' => ['required'],
            'contact_no' => ['required'],
        ]);

        Restaurant::create($data);

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewRestaurants');
        } else {
            return redirect()->route('Restaurants.dashboard');
        }
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

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewRestaurants');
        } else {
            return redirect()->route('Restaurants.dashboard');
        }
    }

    public function destroy($restaurant)
    {
        $user_id = User::where('id', $restaurant)->first();
        $user_id->delete();

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewRestaurants');
        } else {
            return redirect()->route('Restaurants.dashboard');
        }
    }
}
