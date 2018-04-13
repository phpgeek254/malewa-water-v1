<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $location
 * @property mixed $user
 * @property \Carbon\Carbon $deleted_at
 */
class Record extends Model
{
	use SoftDeletes;

    public $previous_reading;
    public $difference;

	protected $dates= ['deleted_at'];
	protected $fillable = ['reading', 'user_id', 'month', 'year', 'location_id', 'status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->orderByDesc('created_at');
    }

   
}
