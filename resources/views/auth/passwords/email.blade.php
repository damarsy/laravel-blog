@extends('main')

@section('title', 'Forgot Password')

@section('style')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!!Form::open(['url' => 'password/email', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                {!!Form::label('email', 'Email Address:')!!}
                {!!Form::email('email', null, array('class' => 'form-control', 'required' => ''))!!}
                <br>
                {!!Form::submit('Send Reset Password Link', array('class' => 'btn btn-primary btn-block'))!!}
            {!!Form::close()!!}
        </div>
    </div>
@endsection

@section('script')
    {!!Html::script('js/parsley.min.js')!!}
@endsection