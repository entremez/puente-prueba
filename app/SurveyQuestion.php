<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    public function questions(){
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }

    public function surveys(){
        return $this->belongsTo('App\Survey', 'id', 'survey_id');
    }
}
