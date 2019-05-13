<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{   

    public function getIndex(){
        $posts = Post::paginate(2);

        return view('blog.index')->withPosts($posts);
    }

    // se fossem dois parametros, era so passar
    // o $slug, $id
    public function getSingle($slug){
    	//return $slug;
    	// fetch from the DB based on slug

    	$post = Post::where('slug', $slug)->first();

    	// return the view an pass in the post object
    	return view('blog.single')->withPost($post);
    	//var_dump($post);
    	//return $post->title."<br/>".$post->body;
    }
}
