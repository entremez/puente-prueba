<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function cases()
    {
        return $this->hasMany('App\Instance');
    }
}
