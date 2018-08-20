<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Mail;
use Session;

class PageController extends Controller {

	public function getIndex() 
	{
		$posts = Post::orderBy('id', 'desc')->paginate(5);
		$categories = Category::orderBy('name', 'asc')->get();
		$tags = Tag::orderBy('name', 'asc')->get();
		
		return view('page.welcome')->with('posts', $posts)->with('categories', $categories)->with('tags', $tags);
	}

	public function getAbout() 
	{
		return view('page.about');
	}

	public function getContact() 
	{
		return view('page.contact');
	}

	public function postContact(Request $request)
	{
		$this->validate($request, array(
			'email'			=> 'required|email',
			'subject'		=> 'required',
			'body_message'	=> 'required'
		));

		$data = [
			'email'			=> $request->email,
			'subject'		=> $request->subject,
			'body_message'	=> $request->body_message
		];

		Mail::send('email.contact', $data, function($message)use($data){
			$message->from($data['email']);
			$message->to('adam@arsy.com');
			$message->subject($data['subject']);
		});

		Session::flash('status', 'The message was successfully sent!');

		return redirect('contact');
	}


}