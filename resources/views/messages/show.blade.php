@extends('main')
@section('title', 'Comment')
@section('content')
  <div class="row">
    <div class="col-md-8 col-sm-offset-2 well">
      	<h1>{{ $comment->title }}</h1>
      	<span class="label label-default"> Posted In : {{ $comment->post->title }} </span>
      	<span class="label label-default"> Posted By : {{ $comment->author->name }} </span>
      	<span class="label label-default"> <a href="{{ route('comments.edit', $comment->id) }}">Edit</a> </span>
      	<br><br>
      	<p>{!! $comment->body !!}</p>
    </div>
  </div>
@endsection