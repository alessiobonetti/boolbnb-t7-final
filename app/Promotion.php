<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    public function apartments()
    {
        return $this->hasMany('App\Apartment');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }

}
