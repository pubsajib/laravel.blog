@extends('main')
@section('title', 'Update')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	{!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}
      		<h1>Update Post</h1> <hr>
      		<div class="form-group">
			    {{ Form::label('title', 'Title : ') }}
			    {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::label('content', 'Content : ') }}
			    {{ Form::text('content', null, array_merge(['class' => 'form-control'])) }}
			</div>
      		<div class="form-group">
      			<div class="row">
      				<div class="col-sm-6">{!! Html::linkRoute('posts.show', 'Cancel',array($post->id), array('class'=>'btn btn-danger btn-block')) !!}</div>
      				<div class="col-sm-6">{!! Form::submit('Save changes', ['class'=>'btn btn-primary btn-block']) !!}</div>
      			</div>
			</div>
		{!! Form::close() !!}
    </div>
  </div>
@endsection