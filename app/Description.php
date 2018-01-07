<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    public function userGlossary() 
    {
        return $this->belongsToMany(UserGlossary::class)->withPivot('cast');
    }
    public function categories() 
    {
        return $this->belongsToMany(Category::class);
    }
    public function word() 
    {
        return $this->belongsTo(Word::class,'id');
    }
}
