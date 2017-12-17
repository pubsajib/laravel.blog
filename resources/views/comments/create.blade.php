  <div class="row">
    <div class="col-md-8">
      	{!! Form::open(['route' => 'comments.store']) !!}
      		<h3>Comment</h3>
      		<input type="hidden" name="post_id" value="{{ $post->id }}">
      		<div class="form-group">
			    {{ Form::text('title', null, array_merge(['class' => 'form-control', 'placeholder' => 'Title'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::text('body', null, array_merge(['class' => 'form-control', 'placeholder' => 'Message'])) }}
			</div>
      		<div class="form-group">
			    {{ Form::submit('Submit', array_merge(['class' => 'btn btn-success btn-md'])) }}
			</div>
		{!! Form::close() !!}
    </div>
  </div>