<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'rut', 'dv_rut', 'name', 'address'
    ];

    public function surveys(){
        return $this->hasMany('App\CompanySurvey');
    }
}
