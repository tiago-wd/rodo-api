<?php

namespace App\Models;

use App\Models\Traits\Relationship\CargoRelationship;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargo
 * @package App\Models
 * @version April 13, 2020, 1:19 pm UTC
 *
 * @property \App\Models\CargoType cargoType
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection bids
 * @property string name
 * @property string description
 * @property string weight
 * @property string price
 * @property string from_where
 * @property string to_where
 * @property integer cargo_type_id
 * @property integer user_id
 */
class Cargo extends Model
{
    use SoftDeletes,
        CargoRelationship;

    public $table = 'cargos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'weight',
        'price',
        'from_where',
        'to_where',
        'cargo_type_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'weight' => 'string',
        'price' => 'string',
        'from_where' => 'string',
        'to_where' => 'string',
        'cargo_type_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'weight' => 'required',
        'price' => 'required',
        'from_where' => 'required',
        'to_where' => 'required'
    ];

}
