@extends('main')
@section('title', 'Login')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			{!!Form::open(['data-parsley-validate' => ''])!!}
				{!!Form::label('email', 'Email:')!!}
				{!!Form::text('email', null, array('class' => 'form-control', 'required' => ''))!!}

				{!!Form::label('password', 'Password:')!!}
				{!!Form::password('password', array('class' => 'form-control', 'required' => ''))!!}

				{!!Form::checkbox('remember')!!} {!!Form::label('remember', 'Remember Me')!!}

				{!!Form::submit('Login', array('class' => 'btn btn-primary btn-block'))!!}
			{!!Form::close()!!}
			<br>
			<p class="text-center">Forgot Password? <a href="{{route('password.request')}}">Reset Password Here</a></p>
			<p class="text-center">Don't have an account? <a href="{{url('register')}}">Register Here</a></p>
		</div>
	</div>
@endsection