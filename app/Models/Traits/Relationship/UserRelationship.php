<?php

namespace App\Models\Traits\Relationship;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transport()
    {
        return $this->belongsTo(\App\Models\Transport::class, 'transport_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargos()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'cargos', 'cargo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'user_roles', 'user_id', 'role_id');
    }
}