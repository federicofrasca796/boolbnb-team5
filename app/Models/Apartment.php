<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'address',
        'latitude',
        'longitude',
        'number_of_rooms',
        'number_of_beds',
        'number_of_baths',
        'square_metres',
        'is_aviable',
        'user_id',
        'sponsor_id',
        'slug'
    ];
}
