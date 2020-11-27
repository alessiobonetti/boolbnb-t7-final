<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Apartment
 */
class Apartment extends Model
{
    protected $guarded = ['services', 'cover'];
    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * services
     *
     * @return void
     */
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    /**
     * views
     *
     * @return void
     */
    public function views()
    {
        return $this->hasMany('App\View');
    }

    /**
     * images
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    /**
     * promotion
     *
     * @return void
     */
    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }
}
