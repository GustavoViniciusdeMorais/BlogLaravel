<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Dizer que o post pertence a uma Categoria
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

}
