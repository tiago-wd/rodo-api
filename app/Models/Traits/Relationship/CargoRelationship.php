<?php

namespace App\Models\Traits\Relationship;

/**
 * Class CargoRelationship.
 */
trait CargoRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargoType()
    {
        return $this->belongsTo(\App\Models\CargoType::class, 'cargo_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bids()
    {
        return $this->hasMany(\App\Models\Bid::class, 'cargo_id', 'id');
    }
}