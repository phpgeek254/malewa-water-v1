<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $location
 * @property \Carbon\Carbon $deleted_at
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'user_level', 'location_id', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function checks()
    {
        return $this->hasMany(Check::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
