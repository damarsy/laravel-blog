@extends('main')
@section('title', 'Reset Password')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!!Form::open(['url' => 'password/reset', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                {!!Form::hidden('token', $token)!!}
                
                {!!Form::label('email', 'Email Address:')!!}
                {!!Form::email('email', null, array('class' => 'form-control', 'required' => ''))!!}

                {!!Form::label('password', 'New Password:')!!}
                {!!Form::password('password', array('class' => 'form-control', 'required' => ''))!!}

                {!!Form::label('password_confirmation', 'Confirm New Password:', 'required' => '')!!}
                {!!Form::password('password_confirmation', array('class' => 'form-control'))!!}
                <br>
                {!!Form::submit('Reset Password', array('class' => 'btn btn-primary btn-block'))!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection