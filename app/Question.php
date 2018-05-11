<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function question_type()
    {
        return $this->belongsTo('App\QuestionType', 'question_type_id');
    }

    public function response_choises()
    {
        return $this->hasMany('App\ResponseChoise', 'question_id');
    }

    public function survey_questions()
    {
        return $this->hasMany('App\SurveyQuestion');
    }
}
