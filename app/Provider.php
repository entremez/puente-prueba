<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Provider extends Model
{
    protected $fillable = [
        'rut', 'dv_rut', 'name', 'address'
    ];

    public function cases()
    {
        return $this->hasMany('App\Instance');
    }

    public function getUrlAttribute()
    {
        if(substr($this->logo, 0, 4) === "http")
            return $this->logo;
        return '/providers/logos/'.$this->logo;
    }
}