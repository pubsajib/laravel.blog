@extends('main')
@section('title', 'Register')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      	{!! Form::open() !!}
      		<h1>User Registration</h1> <hr>
      		<div class="form-group">
			    {{ Form::label('name', 'Name : ') }}
			    {{ Form::text('name', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('email', 'Email : ') }}
			    {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('password', 'Password : ') }}
			    {{ Form::password('password', array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('password_confirmation', 'Password Confirmation : ') }}
			    {{ Form::password('password_confirmation', array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::submit('Register', array_merge(['class' => 'btn btn-success btn-lg btn-block'])) }}
			</div>
		{!! Form::close() !!}
    </div>
  </div>
@endsection