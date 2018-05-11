<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseChoise extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

    public function responses()
    {
        return $this->hasMany('App\Response', 'reponse_choise_id');
    }
}
