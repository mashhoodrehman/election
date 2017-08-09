<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
class Questionnaires extends Model
{
    protected $fillable = ['question'];



   public function answers() {
   		// dd($this->id);
   		return $this->hasMany('App\Answer','question_id_fk');
   }   

  public function teachers()
    {
    	return $this->belongsToMany(Teacher::class,'teachers_id','id');
    }




}
