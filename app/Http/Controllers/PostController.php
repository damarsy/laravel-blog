<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //take all posts from database
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        //return the view
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cats = [];
        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('post.create')->with('cats', $cats)->with('tags', $tags2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'slug'          => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));

        //store to database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags, false);

        //flash message stored in session
        Session::flash('status', 'The post was successfully created!');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find specific post
        $post = Post::find($id);
        

        //return the view with the data
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find specific post
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        //return the view with the data
        return view('post.edit')->with('post', $post)->with('cats', $cats)->with('tags', $tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $post = Post::find($id);
        if($post->slug == $request->slug) {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ));
        }
        else {
            $this->validate($request, array(
                'title'         => 'required|max:255',
                'slug'          => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required'
            ));
        }

        //store to database
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags);

        //flash message stored in session
        Session::flash('status', 'The post was successfully updated!');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('status', 'The post was successfully deleted!');

        return redirect()->route('post.index');
    }
}
