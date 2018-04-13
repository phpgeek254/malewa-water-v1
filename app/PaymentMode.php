<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $deleted_at
 */
class PaymentMode extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'description'];

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
