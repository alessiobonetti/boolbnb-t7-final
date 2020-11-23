<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');

    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function views()
    {
        return $this->hasMany('App\Views');
    }

    public function images()
    {
        return $this->hasMany('App\Images');
    }

    public function promotion()
    {
        return $this->belongsTo('App\Promotion');
    }
}

