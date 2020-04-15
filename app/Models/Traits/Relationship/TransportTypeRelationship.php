<?php

namespace App\Models\Traits\Relationship;

/**
 * Class TransportTypeRelationship.
 */
trait TransportTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transports()
    {
        return $this->hasMany(\App\Models\Transport::class, 'transport_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cargoTransports()
    {
        return $this->belongsToMany(\App\Models\CargoTransport::class, 'cargo_transports', 'cargo_type_id', 'transport_type_id');
    }
}