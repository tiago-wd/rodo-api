<?php

namespace App\Models;

use App\Models\Traits\Relationship\TransportRelationship;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transport
 * @package App\Models
 * @version April 9, 2020, 6:27 pm UTC
 *
 * @property \App\Models\TransportType transportType
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 * @property string brand
 * @property string color
 * @property string plate
 * @property integer transport_type_id
 */
class Transport extends Model
{
    use SoftDeletes,
        TransportRelationship;

    public $table = 'transports';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'brand',
        'color',
        'plate',
        'transport_type_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'brand' => 'string',
        'color' => 'string',
        'plate' => 'string',
        'transport_type_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'brand' => 'required',
        'color' => 'required',
        'plate' => 'required'
    ];
}
