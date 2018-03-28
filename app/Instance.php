<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function images(){
        return $this->hasMany('App\InstanceImage');
    }

    public function services(){
        return $this->hasMany('App\InstanceService');
    }

    public function getFeaturedImageAttribute()
    {
        return $this->images()->where('featured','=', '1')->get()->first()->image;
    }
}
