<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    //
    protected $fillable = ['user_id','comment'];


    Public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function users()
    {
      return $this->belongsToMany('App\User');
    }

}
