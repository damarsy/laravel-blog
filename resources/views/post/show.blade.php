@extends('main')
@section('title', $post->title)
@section('content')
	<div class="row">
		<div class="col-md-8">
			<p class="lead">{!!$post->body!!}</p>
			<p>Tag : @foreach($post->tags as $tag)<span class="badge badge-primary">{{$tag->name}}</span> @endforeach</p>
		</div>
		<div class="col-md 4">
			<dl class="row">
			  <dt class="col-sm-4">Created At</dt>
			  <dd class="col-sm-8">: {{date('M j, Y H:i', strtotime($post->created_at))}}</dd>
			  <dt class="col-sm-4">Last Update</dt>
			  <dd class="col-sm-8">: {{date('M j, Y H:i', strtotime($post->updated_at))}}</dd>
			  <dt class="col-sm-4">Category</dt>
			  <dd class="col-sm-8">: {{$post->category->name}}</dd>
			</dl>
			<a href="{{route('post.edit', array($post->id))}}" class="btn btn-primary btn-block">Edit Post</a>
			{!!Form::open(['route' => array('post.destroy', $post->id), 'method' => 'DELETE'])!!}
			{!!Form::submit('Delete', array('class' => 'btn btn-primary btn-block', 'style' => 'margin-top:5px'))!!}
			{!!Form::close()!!}
			<a href="{{route('post.index')}}" class="btn btn-primary btn-block" style="margin-top:5px">See All Posts</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Comment</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($post->comments as $comment)
					<tr>
						<th>{{$comment->id}}</th>
						<td>{{$comment->name}}</td>
						<td>{{$comment->email}}</td>
						<td>{{$comment->comment}}</td>
						<td>
							{!!Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'DELETE'])!!}
								{!!Form::submit('Delete', array('class' => 'btn btn-sm btn-primary'))!!}
							{!!Form::close()!!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection