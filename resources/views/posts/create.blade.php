@extends('main')
@section('title', 'Create New')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      	{!! Form::open(['route' => 'posts.store']) !!}
      		<h1>Create New Post</h1> <hr>
      		<div class="form-group">
			    {{ Form::label('title', 'Title : ') }}
			    {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::label('content', 'Content : ') }}
			    {{ Form::text('content', null, array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::submit('Create Post', array_merge(['class' => 'btn btn-success btn-lg btn-block'])) }}
			</div>
		{!! Form::close() !!}
    </div>
  </div>
@endsection