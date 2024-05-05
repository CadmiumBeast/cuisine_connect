<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewRestaurants()
    {
        $restaurants = User::where('type', 'Restaurants')->get();

        return view('admin.viewRestaurants', ['restaurants' => $restaurants]);
    }
    public function viewUsers()
    {
        $users = User::where('type', 'Customer')->get();
        return view('admin.viewUsers',['users' => $users]);
    }
}
