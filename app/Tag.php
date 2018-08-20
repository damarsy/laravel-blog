<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //many-to-many relationship to posts
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
