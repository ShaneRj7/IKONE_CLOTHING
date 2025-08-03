<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'image',
        'size',
        'quantity',
        'price',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            validator($model->attributes, [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'category' => 'required|string',
                'image' => 'required|string',
                'size' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            ])->validate();
        });
    }
}
