<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'city',
        'country',
        'product_name',
        'quantity',
        'size',
        'price',
        'image',
        'product_id',
        'user_id',
    ];

    // Add any validation rules if applicable
}
