<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'middlename', 
        'lastname', 
        'firstname',
        'avatar', 
        'gender', 
        'religion', 
        'level', 
        'semester', 
        'faculty_id',
        'department_id',
        'role_id',
        'password',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function regs(){
        return $this->hasMany('App\Reg');
    }
}
