@extends('main')
@section('title', 'Edit comment')
@section('stylesheets')
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  {!! Html::script('js/tinymce.js') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	{!! Form::model($comment, ['route'=>['comments.update', $comment->id], 'method'=>'PUT']) !!}
    		<h1>Edit Comment</h1> <hr>
    		<div class="form-group">
          {{ Form::label('title', 'Title : ') }}
          {{ Form::text('title', null, ['class' => 'form-control']) }}
        </div>
    		<div class="form-group">
			    {{ Form::label('body', 'Message : ') }}
			    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
		    </div>
        <div class="form-group">
          <label>Is Active : </label>
          <select name="is_approved" class="form-control">
            <option value="0" {{ !$comment->is_approved ? 'selected': '' }}>Pending</option>
            <option value="1" {{ $comment->is_approved ? 'selected': '' }}>Active</option>
          </select>
        </div>
    		<div class="form-group">
    			<div class="row">
    				<div class="col-sm-6">{!! Html::linkRoute('comments.show', 'Cancel',array($comment->id), array('class'=>'btn btn-danger btn-block')) !!}</div>
    				<div class="col-sm-6">{!! Form::submit('Save changes', ['class'=>'btn btn-primary btn-block']) !!}</div>
    			</div>
        </div>
		  {!! Form::close() !!}
    </div>
  </div>
@endsection