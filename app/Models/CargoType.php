<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CargoType
 * @package App\Models
 * @version April 13, 2020, 1:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection cargos
 * @property \Illuminate\Database\Eloquent\Collection cargoTransports
 * @property string name
 */
class CargoType extends Model
{
    use SoftDeletes;

    public $table = 'cargo_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

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
