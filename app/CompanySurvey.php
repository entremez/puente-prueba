<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySurvey extends Model
{
    public function companys(){
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }

    public function surveys(){
        return $this->belongsTo('App\Survey', 'id', 'survey_id');
    }
}
