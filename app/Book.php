<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Book extends Model
{
    //
    protected $fillable = [


'name','author','description','count_borrow',


    ];
     public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

  
}


