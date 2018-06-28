@extends('main')
@section('title', 'Post')
@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	{!! Html::script('js/tinymce.js') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8">
    	@unless (empty($post->image))
    		<img src="{{ asset('images/'. $post->image) }}" alt="Featured image" class="img-responsive">
		@endunless
      	<h1>{{ $post->title }}</h1>
      	<p>
			@foreach( $post->tag as $tag )
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
      	</p>
      	<p>{!! $post->content !!}</p>
		<br>
		<h4>Comments <label style="font-size: 13px;" for="commentCounter"> ({{ $post->comment->count() }}) </label> </h4>
		@foreach ($post->comment as $comment)
			<div class="commentContainer well">
				<h4 class="commentTitle"> {{ $comment->title }} </h4>
				<span class="label label-default author"> Posted by :  {{ $comment->author->name }} </span>
				<div class="commentBody">{!! $comment->conent !!}</div>
			</div>
		@endforeach
		@if(Auth::check())
      		@include ('../comments/create')
      	@endif
    </div>
    <div class="col-md-4">
    	<div class="well text-left">
			<table class="table table-bordered">
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