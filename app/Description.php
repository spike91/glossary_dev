<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    public function userGlossary() 
    {
        return $this->belongsToMany(UserGlossary::class)->withPivot('cast');
    }
    public function category() 
    {
        return $this->belongsTo(Category::class)->withPivot('cast');
    }
    public function word() 
    {
        return $this->belongsTo(Word::class,'id');
    }

    public function getCategory(){
        $controller = new HomeController();
        return $controller->getCategoryById($this->category_fk);
    }
}
