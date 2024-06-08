<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addproduct extends Model
{
    protected $table='addproducts';
    protected $fillable = 
    [
        'name',
        'slug',
        'price',
        'size',
        'description',
        'profile',
        'rating',
        'user_id'
];
}
