<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function user(){
       return $this->belongsTo('App\User');
   }
   public function artist(){
       return $this->belongsTo('App\Artist');
   }
   public function ratings(){
       return $this->hasMany('App\Rating');
   }
}
