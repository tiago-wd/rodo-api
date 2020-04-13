<?php

namespace App\Models;

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
    use SoftDeletes;

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
