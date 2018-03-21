<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstanceService extends Model
{
    public function instances(){
        return $this->hasMany('App\Instace');
    }

    public function services(){
        return $this->hasMany('App\Service', 'id', 'service_id');
    }
}
