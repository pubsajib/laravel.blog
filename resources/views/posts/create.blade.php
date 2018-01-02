@extends('main')
@section('title', 'Create New')
@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	{!! Html::script('js/tinymce.js') !!}
@endsection
@section('content')
  <div class="row">
    {!! Form::open(['route' => 'posts.store', 'files'=>true]) !!}
      	<div class="col-sm-12"><h1>Create New Post</h1> <hr></div>
    	<div class="col-md-8">
	      	<div class="well">
	      		<div class="form-group">
				    {{ Form::label('title', 'Title : ') }}
				    {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
				</div>
	      		<div class="form-group">
				    {{ Form::label('body', 'Content : ') }}
				    {{ Form::textarea('body', null, array_merge(['class' => 'form-control'])) }}
				</div>
	      	</div>
    	</div>
    	<div class="col-md-4">
			<div class="well">
				<div class="form-group">
				    {{ Form::label('category_id', 'Category : ') }}
				    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
				</div>
				<div class="form-group">
				    {{ Form::label('tags[]', 'Tags : ') }}
				    {{ Form::select('tags[]', $allTags, null, ['class' => 'form-control sleectTags', 'multiple'=>'true']) }}
			    </div>
			    <div class="form-group">
				    {{ Form::label('image', 'Featured Image : ') }}
				    {{ Form::file('image') }}
				</div>
	      		<div class="form-group">
				    {{ Form::submit('Create Post', array_merge(['class' => 'btn btn-success btn-lg btn-block'])) }}
				</div>
			</div>
    	</div>
	{!! Form::close() !!}
  </div>
  	@section('scripts')
  		{!! Html::script('js/select2.min.js') !!}
		<script>
      jQuery(function ($) {
        $('.sleectTags').select2();
      })
    </script>
	@endsection
@endsection