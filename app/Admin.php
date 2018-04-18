<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    
   protected $fillable=[
    'username', 
    'middlename', 
    'lastname', 
    'firstname',
    'email',
    'password',
    'avatar', 
    'gender', 
    'religion', 
    'faculty_id',
    'department_id',
    'role_id',
   ];

   public function sendPasswordResetNotification($token)
   {
       $this->notify(new AdminResetPasswordNotification($token));
   }

   public function role(){
    return $this->belongsTo('App\Role');
  }

  public function faculty(){
    return $this->belongsTo('App\Faculty');
}

    public function department(){
        return $this->belongsTo('App\Department');
    }
}
