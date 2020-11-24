<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * apartment
     *
     * @return void
     */
    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
