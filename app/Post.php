<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//many-to-one relationship to category
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    //many-to-many relationship to tags
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    //one-to-many relationship to comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
