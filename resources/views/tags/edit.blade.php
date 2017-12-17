@extends('main')
@section('title', 'Post')
@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
    	<h1 class="text-center">Edit Tag</h1>
    	<div class="well text-left">
    		{!! Form::model($tag, ['method'=>'PUT','route' => ['tags.update', $tag->id]]) !!}
    			{!! Form::label('name', 'Name') !!}
    			{!! Form::text('name', null, ['class'=>'form-control']) !!}
    			<br>
    			<p class="text-center">
    				{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
    			</p>
    		{!! Form::close() !!}
    	</div>
    </div>
  </div>
@endsection