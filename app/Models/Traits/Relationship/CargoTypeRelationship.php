<?php

namespace App\Models\Traits\Relationship;

/**
 * Class CargoTypeRelationship.
 */
trait CargoTypeRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cargos()
    {
        return $this->hasMany(\App\Models\Cargo::class, 'cargo_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cargoTransports()
    {
        return $this->belongsToMany(\App\Models\CargoTransport::class, 'cargo_transports', 'transport_type_id', 'cargo_type_id');
    }
}