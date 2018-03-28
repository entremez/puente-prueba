<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstanceImage extends Model
{
    public function case()
    {
        return $this->belongsTo('App\Instance');
    }

    public function getUrlAttribute()
    {
        if(substr($this->logo, 0, 4) === "http")
            return $this->image;
        return '/images/cases/'.$this->image;
    }
}
