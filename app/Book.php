<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\History;
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

        public function history()
    {
        return $this->belongsToMany('App\User','histories')->withTimestamps();
    }


   
  
}


