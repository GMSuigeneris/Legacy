<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
   'name',
   'code',
   'semester',
   'level',
   'faculty_id',
   'department_id'
    ];

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }
}
