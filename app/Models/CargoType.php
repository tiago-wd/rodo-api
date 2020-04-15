<?php

namespace App\Models;

use App\Models\Traits\Relationship\CargoTypeRelationship;
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
    use SoftDeletes,
        CargoTypeRelationship;

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
}
