<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }

}
