<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }
}
