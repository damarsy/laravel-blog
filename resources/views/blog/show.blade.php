@extends('main')
@section('title', $post->title)
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p class="lead">{{$post->body}}</p>
			<p>Category : {{$post->category->name}}</p>
			<p>Tag : @foreach($post->tags as $tag)<span class="badge badge-primary">{{$tag->name}}</span> @endforeach</p>
		</div>
	</div>
@endsection