<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public function descriptions()
    {
       return $this->belongsTo(Description::class,'id');
    }
}
