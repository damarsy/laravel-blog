@extends('main')
@section('title', 'All Posts')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{route('post.create')}}" class="btn btn-primary btn-lg btn-block">Create New Post</a>
			<br>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Body</th>
			      <th scope="col">Created At</th>
			      <th scope="col">Updated At</th>
			      <th scope="col" width="17%"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($posts as $post)
			    <tr>
			      <th scope="row">{{$post->id}}</th>
			      <td>{{substr($post->title, 0, 20)}}{{strlen($post->title)>20 ? '...':''}}</td>
			      <td>{{substr(strip_tags($post->body), 0, 40)}}{{strlen(strip_tags($post->body))>40 ? '...':''}}</td>
			      <td>{{date('M j, Y h:i A', strtotime($post->created_at))}}</td>
			      <td>{{date('M j, Y h:i A', strtotime($post->updated_at))}}</td>
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
			<div class="row justify-content-center">
				{{$posts->links()}}
			</div>
		</div>
	</div>
@endsection