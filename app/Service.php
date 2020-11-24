<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Service
 */
class Service extends Model
{
    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment');
    }
}
