<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [

        'Contact_no',
        'Address',
    ];

    protected $casts = [
        'user_id' => 'string',
    ];
}
