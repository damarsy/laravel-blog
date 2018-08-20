<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function getShow($slug)
    {
    	$post = Post::where('slug', $slug)->first();

    	return view('blog.show')->with('post', $post);
    }

    public function getCategory($slug)
    {
    	$category = Category::where('slug', $slug)->first();
    	$categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
    	
    	return view('blog.category')->with('category', $category)->with('categories', $categories)->with('tags', $tags);
    }

    public function getTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        
        return view('blog.tag')->with('tag', $tag)->with('tags', $tags)->with('categories', $categories);
    }

}
