@extends('main')
@section('title', "$tag->name Tag")
@section('content')
	<div class="row">
		<div class="col-md-8">
			@foreach($tag->posts as $post)
    		<div class="post">
      		<h3>{{$post->title}}</h3>
      		<p>{{substr($post->body, 0, 300)}}{{strlen($post->body)>300 ? '...':''}}</p>
      		<a class="btn btn-primary" href="{{route('blog.show', $post->slug)}}" role="button">Read More</a>
      	</div>
      	<hr>
    	@endforeach
    </div>
    @include('partial._sidebar')
	</div>
@endsection