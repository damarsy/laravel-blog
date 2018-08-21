@extends('main')

@section('title', 'Edit Post')

@section('style')
	{!!Html::style('css/parsley.css')!!}
	{!!Html::style('css/select2.min.css')!!}

@endsection

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-8">
			{!! Form::model($post, ['route' => array('post.update', $post->id), 'data-parsley-validate' => '', 'method' => 'PUT']) !!}
			    {!!Form::label('title', 'Title:')!!}
			    {!!Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))!!}

				{!!Form::label('slug', 'Slug:')!!}
			    {!!Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))!!}

			    {!!Form::label('category_id', 'Category:')!!}
			    {!!Form::select('category_id', $cats, null, array('class' => 'form-control'))!!}

			    {!!Form::label('tags', 'Tag:')!!}
			    {!!Form::select('tags[]', $tags, null, array('class' => 'form-control select2-multiple', 'multiple' => 'multiple'))!!}

			    {!!Form::label('body', 'Body:')!!}
			    {!!Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))!!}

			    {!!Form::submit('Save Post', array('class' => 'btn btn-primary btn-block', 'style' => 'margin-top:20px'))!!}
			    <a href="{{route('post.show', $post->id)}}" class="btn btn-primary btn-block">Cancel</a>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('script')
	{!!Html::script('js/parsley.min.js')!!}
	{!!Html::script('js/select2.min.js')!!}
	<script>
		$(document).ready(function() {
		    $('.select2-multiple').select2();
		});
	</script>
@endsection