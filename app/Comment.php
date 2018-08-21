<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//many-to-one relationship to post
    public function post() 
    {
    	return $this->belongsTo('App\Post');
    }
}
