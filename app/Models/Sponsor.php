<?php

namespace App\Models;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsor extends Model
{
    protected $fillable = ['name', 'slug', 'duration', 'price'];

    /**
     * The apartments that belong to the Sponsor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartments(): BelongsToMany
    {
        return $this->belongsToMany(Apartment::class)
            ->withPivot('expires_on')
            ->withTimestamps();
    }
}
