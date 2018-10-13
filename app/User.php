<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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


    public function book()
    {
        return $this->belongsToMany('App\Book')->withTimestamps();;
    }

 public function your_book()
 {
    return $this->hasMany('App\PersonalLibrary');
 }


   



    public function getId()
{
  return $this->id;
}

public function getRole()
{
    return $this->role;
}


}
