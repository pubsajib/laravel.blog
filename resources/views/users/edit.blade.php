@extends('main')
@section('title', 'Edit user')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	{!! Form::model($user, ['route'=>['user.update', $user->id], 'method'=>'PUT', 'files'=>true]) !!}
      		<h1>Edit User</h1> <hr>
      		<div class="form-group">
			    {{ Form::label('image', 'Avatar : ') }}
			    {{ Form::file('image') }}
			</div>
			@if ($user->image)
				<div class="userImageContainer">
					<img src="{{ asset('images/'. $user->image) }}" alt="Avatar">
				</div>
			@endif
      		<div class="form-group">
			    {{ Form::label('fname', 'First Name : ') }}
			    {{ Form::text('fname', null, array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::label('lname', 'Last Name : ') }}
			    {{ Form::text('lname', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('email', 'Email : ') }}
			    {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('age', 'Age : ') }}
			    {{ Form::number('age', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('city', 'City : ') }}
			    {{ Form::text('city', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('state', 'State : ') }}
			    {{ Form::text('state', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('zip', 'Zip code: ') }}
			    {{ Form::text('zip', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('country', 'Country : ') }}
			    {{ Form::text('country', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    <select class="form-control" name="is_active">
					<option value="0" {{ $user->is_active ? 'selected' : '' }} >In Active</option>
					<option value="1" {{ $user->is_active ? 'selected' : '' }} >Active</option>
				</select>
			</div>
      		<div class="form-group">
			    {{ Form::submit('Register', array_merge(['class' => 'btn btn-success btn-lg btn-block'])) }}
			</div>
		{!! Form::close() !!}
    </div>
  </div>
@endsection