<?php

namespace App\Models;

use App\Models\Message;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\View;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'slug',
        'service_id',
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
     * Get the user that owns the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the message for the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get all of the view for the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function view(): HasMany
    {
        return $this->hasMany(View::class);
    }

    /**
     * The sponsors that belong to the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class)->withTimestamps();
    }

    /**
     * The services that belong to the Apartment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
