<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'address',
        'thumbnail',
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


    /**
     * Get the route key for the model
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
    * Get all of the user for the post
    * 
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function user(): BelongsTo   
    {
        return $this->belongsTo(User::class);
    }

    
}
