<?php

namespace App\Models\Traits\Relationship;

/**
 * Class TransportRelationship.
 */
trait TransportRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transportType()
    {
        return $this->belongsTo(\App\Models\TransportType::class, 'transport_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'transport_id', 'id');
    }
    
}