@extends('main')
<?php $post_title = htmlspecialchars($post->title) ?>
@section('title', $post_title)

@section('style')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			<p class="lead">{!!$post->body!!}</p>
			<img src="{{url('image/'.$post->image)}}" width="200" height="200">
			<p>Category : {{$post->category->name}}</p>
			<p>Tag : @foreach($post->tags as $tag)<span class="badge badge-primary">{{$tag->name}}</span> @endforeach</p>
			<hr>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h3>Add New Comment</h3>
			{!!Form::open(['route' => array('comment.store', $post->slug), 'data-parsley-validate' => ''])!!}
				{!!Form::label('name', 'Name:')!!}
				{!!Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))!!}

				{!!Form::label('email', 'Email:')!!}
				{!!Form::text('email', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))!!}

				{!!Form::label('comment', 'Comment:')!!}
				{!!Form::textarea('comment', null, array('class' => 'form-control', 'rows' => '5', 'required' => ''))!!}
				<br>
				{!!Form::submit('Submit New Comment', array('class' => 'btn btn-primary'))!!}
			{!!Form::close()!!}
			<hr>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<h3>All Comments</h3>
				@foreach($post->comments as $comment)
				<div class="border" style="padding: 10px; margin-top: 10px">
					<p><strong>{{$comment->name}}</strong></p>
					<p>{{$comment->comment}}</p>
				</div>
				@endforeach
		</div>
	</div>
@endsection

@section('script')
    {!!Html::script('js/parsley.min.js')!!}
@endsection