<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reg extends Model
{
   protected $fillable=[
        'user_id',
        'level',
        'status',
        'semester',
        'courses' 
   ];

   public function user(){
    return $this->belongsTo('App\User');
   }
}
