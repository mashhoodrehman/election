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
        'fName' , 'lName' , 'email', 'password', 'email_token',  'image' , 'role', 'status', 'city' , 'zip' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function verified()
    {
       $this->verified = 1;
       $this->email_token = null;
       $this->save();
    }


    public function voters(){
        return $this->hasOne('App\Voter');
    }
    public function candidates(){
        return $this->hasOne('App\Candidate');
    }

    
    public function questionnairestablesusers(){
        return $this->hasMany('App\QuestionnaireTeacherUser','users_id');

    }
}
