@extends('main')
<?php $tag_name = htmlspecialchars($tag->name)?>
@section('title', "$tag_name Tag")
@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Body</th>
			      <th scope="col">Tag</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($tag->posts as $post)
			    <tr>
			      <th scope="row">{{$post->id}}</th>
			      <td>{{substr($post->title, 0, 20)}}{{strlen($post->title)>20 ? '...':''}}</td>
			      <td>{{substr(strip_tags($post->body), 0, 40)}}{{strlen(strip_tags($post->body))>40 ? '...':''}}</td>
			      <td>
			      	@foreach($post->tags as $tag)
						<span class="badge badge-primary">{{$tag->name}}</span>
			      	@endforeach
			      </td>
			      <td>
			      	{!!Form::open(['route' => array('post.destroy', $post->id), 'method' => 'DELETE'])!!}
			      	<a href="{{route('post.show', $post->id)}}" class="btn btn-primary btn-sm">View</a>
			      	<a href="{{route('post.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a>
					{!!Form::submit('Delete', array('class' => 'btn btn-primary btn-sm'))!!}
					{!!Form::close()!!}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
@endsection