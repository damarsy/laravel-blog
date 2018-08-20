@extends('main')
@section('title', 'Create New Tag')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!!Form::open(['route' => 'tag.store', 'data-parsley-validate' => ''])!!}
				{!!Form::label('name', 'Tag Name:')!!}
				{!!Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))!!}

				{!!Form::label('slug', 'Slug URL:')!!}
				{!!Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))!!}
				<br>
				{!!Form::submit('Create Tag', array('class' => 'btn btn-primary btn-block'))!!}
			{!!Form::close()!!}
		</div>
	</div>
@endsection