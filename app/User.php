<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\HomeController;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userGlossaries() 
    {
        return $this->belongsToMany(UserGlossary::class);
    }

    public function wordIsExistInGlossary($description) 
    {
        $controller = new HomeController();
        return $controller->WordIsExistInGlossary($this->id,$description);
    }

    public function isAdmin()
    {
        $controller = new HomeController();
        return $controller->isAdmin($this->id);
    }

    
}
