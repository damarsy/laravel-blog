@extends('main')

@section('title', 'Create New Category')

@section('style')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!!Form::open(['route' => 'category.store', 'data-parsley-validate' => ''])!!}
				{!!Form::label('name', 'Category Name:')!!}
				{!!Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))!!}

				{!!Form::label('slug', 'Slug URL:')!!}
				{!!Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))!!}
				<br>
				{!!Form::submit('Create Category', array('class' => 'btn btn-primary btn-block'))!!}
			{!!Form::close()!!}
		</div>
	</div>
@endsection

@section('script')
    {!!Html::script('js/parsley.min.js')!!}
@endsection