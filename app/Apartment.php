<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}

