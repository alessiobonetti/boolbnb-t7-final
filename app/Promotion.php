<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Promotion
 */
class Promotion extends Model
{

    /**
     * apartments
     *
     * @return void
     */
    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }
}
