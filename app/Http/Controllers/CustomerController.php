<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }
    public  function create($customer)
    {
        return view('customer.create', compact('customer'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'Contact_no' => ['required'],
            'Address' => ['required'],
        ]);

        Customer::create($data);

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewUsers');
        }else
        return redirect()->route('Customer.dashboard');
    }

    public function show(Customer $customer)
    {
        return $customer;
    }

    public function editCustomer($customer, User $user)
    {
        $user_id = Customer::where('user_id', $customer)->first();


        if (!$user_id) {
            $authenticatedUser = auth()->user();

            // Generate the route name dynamically based on the user type
            $routeName = $authenticatedUser->type . '.createCustomer';
            // Redirect to the dynamically generated route
            return redirect()->route($routeName, ['customer' => $customer]);
        }

        return view('customer.edit', compact('user_id'));

    }
    public function update(Request $request, Customer $customer)
    {

        $data = $request->validate([
            'user_id' => ['required'],
            'Contact_no' => ['required'],
            'Address' => ['required'],
        ]);

        $customer->update($data);

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewUsers');
        }else
            return redirect()->route('Customer.dashboard');
    }

    public function destroy($customer, User $user)
    {
        $user_id = User::where('id', $customer)->first();
        $user_id->delete();

        if (auth()->user()->type === 'Admin') {
            return redirect()->route('Admin.viewUsers');
        }else
            return redirect()->route('logout');
    }
}
