<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
	 
     public function users()
    {
        return $this->belongsTo('App\User');
    }
}
