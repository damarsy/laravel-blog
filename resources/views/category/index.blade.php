@extends('main')
@section('title', 'All Categories')
@section('content')
	<div class="row">
		<a href="{{route('category.create')}}" class="btn btn-primary btn-lg btn-block">Create New Category</a>
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
			  	@foreach($categories as $category)
			    <tr>
			      <th scope="row">{{$category->id}}</th>
			      <td>{{$category->name}}</td>
			      <td>
			      	{!!Form::open(['route' => array('category.destroy', $category->id), 'method' => 'DELETE'])!!}
			      	<a href="{{route('category.show', $category->id)}}" class="btn btn-primary btn-sm">View</a>
					{!!Form::submit('Delete', array('class' => 'btn btn-primary btn-sm'))!!}
					{!!Form::close()!!}</td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			<div class="row justify-content-center">
				{{$categories->links()}}
			</div>
		</div>
	</div>
@endsection