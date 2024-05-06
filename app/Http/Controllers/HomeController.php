<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('auth.dashboard.admindashboard');
    }
    public function customer()
    {
        return view('auth.dashboard.customerdashboard');
    }
    public function restaurants()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();

        $user_id = Auth::user();
        return view('auth.dashboard.restaurantsdashboard', compact('user_id', 'items'));
    }

}
