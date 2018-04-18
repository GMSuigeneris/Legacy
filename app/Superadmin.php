<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    protected $fillable=[
        'username', 
        'middlename', 
        'lastname', 
        'firstname',
        'avatar', 
        'gender', 
        'religion', 
        'role_id',
       ];

       public function role(){
         return $this->belongsTo('App\Role');
       }
}
