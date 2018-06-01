<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'rut', 'dv_rut', 'name', 'address'
    ];

    public function survey_responses(){
        return $this->hasMany('App\SurveyResponse');
    }
}
