<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'Contact_no' => ['required'],
            'Address' => ['required'],
        ]);

        return Customer::create($data);
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'Contact_no' => ['required'],
            'Address' => ['required'],
        ]);

        $customer->update($data);

        return $customer;
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json();
    }
}
