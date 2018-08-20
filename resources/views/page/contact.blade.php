@extends('main')
@section('title', 'Conctact')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      {!!Form::open(['url' => 'contact', 'method' => 'POST'])!!}
        {!!Form::label('email', 'Email:')!!}
        {!!Form::text('email', null, array('class' => 'form-control'))!!}

        {!!Form::label('subject', 'Subject:')!!}
        {!!Form::text('subject', null, array('class' => 'form-control'))!!}

        {!!Form::label('body_message', 'Message:')!!}
        {!!Form::textarea('body_message', null, array('class' => 'form-control'))!!}
        <br>
        {!!Form::submit('Submit', array('class' => 'btn btn-primary'))!!}
      {!!Form::close()!!}
    </div>
  </div>
@endsection