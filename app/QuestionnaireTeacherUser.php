<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireTeacherUser extends Model
{
    public function users()
    {
    	return $this->belongsTo(User::class,'users_id','id');
    }

    public function teachers()
    {
    	return $this->belongsTo(Teacher::class,'teachers_id','id');
    }
}
