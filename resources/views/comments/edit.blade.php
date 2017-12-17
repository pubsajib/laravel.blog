@extends('main')
@section('title', 'Update')
@section('stylesheets')
  {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	{!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}
    		<h1>Update Post</h1> <hr>
    		<div class="form-group">
          {{ Form::label('title', 'Title : ') }}
          {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('slug', 'Slug : ') }}
          {{ Form::text('slug', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('category_id', 'Category : ') }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
			    {{ Form::label('tags', 'Tags : ') }}
			    {{ Form::select('tags[]', $allTags, null, ['class' => 'form-control sleectTags', 'multiple'=>'true']) }}
		    </div>
    		<div class="form-group">
			    {{ Form::label('content', 'Content : ') }}
			    {{ Form::text('content', null, ['class' => 'form-control']) }}
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
  @section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    <script>
      jQuery(function ($) {
        $('.sleectTags').select2();
        $('.sleectTags').select2().val( {{ json_encode($post->tag()->allRelatedIds()) }} ).trigger('change')
      })
    </script>
  @endsection
@endsection