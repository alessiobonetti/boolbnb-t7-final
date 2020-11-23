<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public function apartmentView()
    {
        return $this->belongsTo('App\Apartment');
    }
}
