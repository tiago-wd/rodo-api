<?php

namespace App\Models;

use App\Models\Traits\Attribute\UserAttribute;
use App\Models\Traits\Relationship\UserRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @version April 8, 2020, 6:11 pm UTC
 *
 * @property \App\Models\Transport transport
 * @property \App\Models\Cargo cargos
 * @property \Illuminate\Database\Eloquent\Collection roles
 * @property string name
 * @property string email
 * @property string email_verified_at
 * @property string password
 * @property string avatar
 * @property string activation_token
 * @property string remember_token
 * @property string cnh
 * @property string identity_number
 * @property string fone
 * @property integer transport_id
 * @property boolean active
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes,
        UserRelationship,
        UserAttribute;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'avatar',
        'activation_token',
        'remember_token',
        'geopoint',
        'cnh',
        'identity_number',
        'fone',
        'transport_id',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'avatar' => 'string',
        'activation_token' => 'string',
        'remember_token' => 'string',
        'geopoint' => 'string',
        'cnh' => 'string',
        'identity_number' => 'string',
        'fone' => 'string',
        'transport_id' => 'integer',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'email_verified_at' => 'nullable',
        'avatar' => 'nullable'
    ];

    protected $appends = ['avatar_url'];

}
