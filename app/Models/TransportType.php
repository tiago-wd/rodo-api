<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransportType
 * @package App\Models
 * @version April 9, 2020, 6:11 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection transports
 * @property \Illuminate\Database\Eloquent\Collection cargoTransports
 * @property string name
 */
class TransportType extends Model
{
    use SoftDeletes;

    public $table = 'transport_types';
    

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
