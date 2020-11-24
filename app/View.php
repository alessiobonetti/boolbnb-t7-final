<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * View
 */
class View extends Model
{
    /**
     * apartmentView
     *
     * @return void
     */
    public function apartmentView()
    {
        return $this->belongsTo('App\Apartment');
    }
}
