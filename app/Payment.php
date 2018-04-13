<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property \Carbon\Carbon $deleted_at
 */
class Payment extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'amount', 'record_id', 'transaction_id', 'payment_mode_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function record()
    {
    	return $this->belongsTo(Record::class);
    }

    public function paymentMode()
    {
    	return $this->belongsTo(PaymentMode::class);
    }
}
