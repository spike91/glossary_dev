<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Category extends Model
{
    public function descriptions() 
    {
       return $this->belongsToMany(Description::class,'id');
    }

    public function getName(){
        $name=$this->english;
        $locale = App::getLocale();
        if($locale == 'ru') $name=$this->russian;
        if($locale == 'et') $name=$this->estonian;
        return $name;
    }

    public function getLocale(){
        return App::getLocale();
    }
}
