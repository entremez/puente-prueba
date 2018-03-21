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
        return $this->hasMany('App\CaseImage');
    }

    public function services(){
        return $this->hasMany('App\InstanceService');
    }
}
