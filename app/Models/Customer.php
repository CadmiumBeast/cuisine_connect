<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'Contact_no',
        'Address',
    ];

    protected $casts = [
        'user_id' => 'string',
    ];

    public function editCustomer(User $user)
    {
        $customer = Customer::where('user_id', $user->id)->first();
        return view('customer.edit', compact('customer'));
    }
}
