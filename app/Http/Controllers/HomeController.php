<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('auth.dashboard.restaurantsdashboard');
    }

}
