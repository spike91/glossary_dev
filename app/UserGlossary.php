<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGlossary extends Model
{
    public function description() 
    {
       return $this->belongsTo(Description::class,'id');
    }

    public function user() 
    {
       return $this->belongsTo(User::class,'id');
    }
}
