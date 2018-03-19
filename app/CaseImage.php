<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseImage extends Model
{
    public function case()
    {
        return $this->belongsTo('App\Instance');
    }
}
