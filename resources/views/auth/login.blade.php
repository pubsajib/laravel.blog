@extends('main')
@section('title', 'Login')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      	{!! Form::open() !!}
      		<h1>User Login</h1> <hr>
      		<div class="form-group">
			    {{ Form::label('email', 'Email : email@gmail.com') }}
			    {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('password', 'Password : 123456') }}
			    {{ Form::password('password', array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    <label for="remember"><input id="remember" name="remember" type="checkbox" value="1"> Remember Me</label>
			</div>
      		<div class="form-group">
			    {{ Form::submit('LogIn', array_merge(['class' => 'btn btn-success btn-lg btn-block'])) }}
			</div>
		{!! Form::close() !!}
		<p>Dont have account? Please <a href="{{ url('register') }}"> register. </a> </p>
    </div>
  </div>
@endsection