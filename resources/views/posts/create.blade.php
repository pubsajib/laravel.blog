@extends('main')
@section('title', 'Create New')
@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection
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
			    {{ Form::label('slug', 'Slug : ') }}
			    {{ Form::text('slug', null, array_merge(['class' => 'form-control'])) }}
			</div>
			<div class="form-group">
			    {{ Form::label('category_id', 'Category : ') }}
			    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
			    {{ Form::label('tags[]', 'Tags : ') }}
			    {{ Form::select('tags[]', $allTags, null, ['class' => 'form-control sleectTags', 'multiple'=>'true']) }}
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
  	@section('scripts')
  		{!! Html::script('js/select2.min.js') !!}
		<script>
      jQuery(function ($) {
        $('.sleectTags').select2();
      })
    </script>
	@endsection
@endsection