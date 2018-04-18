<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable=[
        'name'
    ];

    public function departments(){
        return $this->hasMany('App\Department');
    }

    public function courses(){
        return $this->hasManyThrough('App\Course','App\Department');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function admins(){
        return $this->hasMany('App\Admin');
    }
}
