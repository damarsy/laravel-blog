@extends('main')
@section('title', 'All Tags')
@section('content')
	<div class="row">
		<a href="{{route('tag.create')}}" class="btn btn-primary btn-lg btn-block">Create New Tag</a>
		<br>
		<div class="col-md-12">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($tags as $tag)
			    <tr>
			      <th scope="row">{{$tag->id}}</th>
			      <td>{{$tag->name}}</td>
			      <td>
			      	{!!Form::open(['route' => array('tag.destroy', $tag->id), 'method' => 'DELETE'])!!}
			      	<a href="{{route('tag.show', $tag->id)}}" class="btn btn-primary btn-sm">View</a>
					{!!Form::submit('Delete', array('class' => 'btn btn-primary btn-sm'))!!}
					{!!Form::close()!!}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			<div class="row justify-content-center">
				{{$tags->links()}}
			</div>
		</div>
	</div>
@endsection