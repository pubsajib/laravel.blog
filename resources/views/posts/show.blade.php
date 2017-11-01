@extends('main')
@section('title', 'Post')
@section('content')
	{{--{{ dd($post) }}--}}
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