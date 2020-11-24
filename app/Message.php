<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Message
 */
class Message extends Model
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
