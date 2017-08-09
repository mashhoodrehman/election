<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function elections()
    {
        return $this->belongsTo('App\Election');
    }



}
