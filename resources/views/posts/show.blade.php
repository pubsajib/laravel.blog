@extends('main')
@section('title', 'Post')
@section('stylesheets')
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
	tinymce.init({
	  selector: 'textarea',
	  branding: false,
	  menubar : false,
	  statusbar: false,
	  plugins: [ 'autosave', 'lists', 'autolink', 'link', 'image' ],
	  toolbar: 'undo redo | styleselect | bold italic | link unlink image | alignleft aligncenter alignright outdent indent | bullist numlist',
	});
	</script>
@endsection
@section('content')
  <div class="row text-center">
  	<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Create New Post</a>
  </div>
  <div class="row">
    <div class="col-md-8">
      	<h1>{{ $post->title }}</h1>
      	<p>
			@foreach( $post->tag as $tag )
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
      	</p>
      	<p>{{ $post->content }}</p>

      	@include ('../comments/create')
    </div>
    <div class="col-md-4">
    	<div class="well text-left">
			<table class="table table-bordered">
				<tr>
					<td>Url : </td>
					<td><a href="{{ url($post->slug) }}">{{ url($post->slug) }}</a></td>
				</tr>
				<tr>
					<td>Posted In : </td>
					<td><a href="{{ route('categories.index') }}">{{ $post->category->name }}</a></td>
				</tr>
				<tr>
					<td>Author : </td>
					<td><a href="{{ route('user.show', $post->author) }}">{{ $post->author->name }}</a></td>
				</tr>
				<tr>
					<td>Created At : </td>
					<td>{{ date('M j, Y h:i A', strtotime($post->created_at)) }}</td>
				</tr>
				<tr>
					<td>Updated At : </td>
					<td>{{ date('M j, Y h:i A', strtotime($post->updated_at)) }}</td>
				</tr>
			</table>
			<div class="col-sm-6">
				{!! Html::linkRoute('posts.edit', 'Edit',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
			</div>
			<div class="col-sm-6">
				{!! Form::open(['method'=>'delete', 'route'=>['posts.destroy', $post->id], 'class'=>'deleteForm']) !!}
				{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
				{!! Form::close() !!}
			</div>
			<div class="clearfix"></div>
			<br>
			<div class="col-sm-12">
				{!! Html::linkRoute('posts.index', 'See all posts >>', '', ['class'=>'btn btn-default btn-block']) !!}
			</div>
			<div class="clearfix"></div>
    	</div>
    </div>
  </div>
@endsection