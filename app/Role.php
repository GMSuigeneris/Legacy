<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'name'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function admins(){
        return $this->hasMany('App\Admin');
    }

    public function superadmins(){
        return $this->hasMany('App\Superadmin');
    }
}
