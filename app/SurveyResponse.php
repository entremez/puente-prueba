<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    public function survey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }

    public function responses()
    {
        return $this->hasMany('App\Response', 'survey_reponse_id');
    }
}
