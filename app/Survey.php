<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function company()
    {
        return $this->hasMany('App\CompanySurvey');
    }
}
