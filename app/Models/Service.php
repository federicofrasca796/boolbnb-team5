<?php

namespace App\Models;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    /**
     * The apartments that belong to the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apartments(): BelongsToMany
    {
        return $this->belongsToMany(Apartment::class);
    }
}
