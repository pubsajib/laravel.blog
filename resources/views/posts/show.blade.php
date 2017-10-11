@extends('main')
@section('title', 'Post')
@section('content')
  <div class="row text-center">
  	<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Create New Post</a>
  </div>
  <div class="row">
    <div class="col-md-8">
      	<h1>{{ $post->title }}</h1>
      	<p>{{ $post->content }}</p>
    </div>
    <div class="col-md-4">
    	<div class="well text-left">
			<dl class="dl-horizontal">
				<dt>Created At : </dt>
				<dd>{{ date('M j, Y h:i A', strtotime($post->created_at)) }}</dd>
				<dt>Updated At : </dt>
				<dd>{{ date('M j, Y h:i A', strtotime($post->updated_at)) }}</dd>
			</dl>
			<div class="col-sm-6">
				{!! Html::linkRoute('posts.edit', 'Edit',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
			</div>
			<div class="col-sm-6">
				{!! Html::linkRoute('posts.destroy', 'Delete',array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
			</div>
			<div class="clearfix"></div>
    	</div>
    </div>
  </div>
@endsection