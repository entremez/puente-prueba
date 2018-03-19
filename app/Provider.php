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
}