<?php

namespace App\Models;

use App\Models\Traits\Relationship\TransportTypeRelationship;
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
    use SoftDeletes,
        TransportTypeRelationship;

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
}
