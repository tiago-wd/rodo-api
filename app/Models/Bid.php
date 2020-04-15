<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bid
 * @package App\Models
 * @version April 15, 2020, 5:10 pm UTC
 *
 * @property \App\Models\Cargo cargo
 * @property \App\Models\User user
 * @property \App\Models\User driver
 * @property integer cargo_id
 * @property integer user_id
 * @property integer driver_id
 * @property string bid_status
 * @property string status
 */
class Bid extends Model
{
    use SoftDeletes;

    public $table = 'bids';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cargo_id',
        'user_id',
        'driver_id',
        'bid_status',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cargo_id' => 'integer',
        'user_id' => 'integer',
        'driver_id' => 'integer',
        'bid_status' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bid_status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'cargo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function driver()
    {
        return $this->belongsTo(\App\Models\User::class, 'driver_id', 'id');
    }
}
