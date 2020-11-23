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

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function views()
    {
        return $this->hasMany('App\Views');
    }
}

