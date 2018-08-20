@extends('main')

@section('title', 'Register')

@section('style')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!!Form::open(['data-parsley-validate' => ''])!!}
				{!!Form::label('name', 'Name:')!!}
				{!!Form::text('name', null, array('class' => 'form-control', 'required' => ''))!!}

				{!!Form::label('email', 'Email:')!!}
				{!!Form::text('email', null, array('class' => 'form-control', 'required' => ''))!!}

				{!!Form::label('password', 'Password:')!!}
				{!!Form::password('password', array('class' => 'form-control', 'required' => ''))!!}

				{!!Form::label('password_confirmation', 'Confirm Password:')!!}
				{!!Form::password('password_confirmation', array('class' => 'form-control', 'required' => ''))!!}
				<br>
				{!!Form::submit('Register', array('class' => 'btn btn-primary btn-block'))!!}
			{!!Form::close()!!}
			<br>
			<p class="text-center">Already have an account? <a href="{{url('auth/login')}}">Login</a></p>
		</div>
	</div>
@endsection

@section('script')
    {!!Html::script('js/parsley.min.js')!!}
@endsection