<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//defining tabel name for this model
    protected $table = 'categories';

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
