<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'rut', 'dv_rut', 'name', 'address'
    ];
}