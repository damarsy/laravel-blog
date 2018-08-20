@extends('main')

@section('title', 'Conctact')

@section('style')
    {!!Html::style('css/parsley.css')!!}
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      {!!Form::open(['url' => 'contact', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
        {!!Form::label('email', 'Email:')!!}
        {!!Form::text('email', null, array('class' => 'form-control', 'required' => ''))!!}

        {!!Form::label('subject', 'Subject:')!!}
        {!!Form::text('subject', null, array('class' => 'form-control', 'required' => ''))!!}

        {!!Form::label('body_message', 'Message:')!!}
        {!!Form::textarea('body_message', null, array('class' => 'form-control', 'required' => ''))!!}
        <br>
        {!!Form::submit('Submit', array('class' => 'btn btn-primary'))!!}
      {!!Form::close()!!}
    </div>
  </div>
@endsection

@section('script')
    {!!Html::script('js/parsley.min.js')!!}
@endsection