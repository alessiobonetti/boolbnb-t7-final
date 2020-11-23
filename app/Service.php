<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
