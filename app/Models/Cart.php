<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'restaurant_id',
        'Quantity',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Get the maximum value of the field and increment it by 1
            $maxValue = static::max('order_number');
            $model->order_number = $maxValue + 1;
        });
    }
}
