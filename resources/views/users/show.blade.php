@extends('main')
@section('title', 'User')
@section('stylesheets')
    {!! Html::style('css/styles.css') !!}
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center">{{ $user->name }} Details</h1>
    	@if ($user)
    		<div class="well">
                <legend>Profile <a class="label label-default text-small" href="{{ route('user.edit', $user->id) }}">Edit</a></legend>
                @if ($user->image)
                    <img src="{{ asset('images/'. $user->image) }}" alt="avatar" class="img-responsive img-rounded">
                @endif
                <br>
                <p>Name : {{ fullName($user->fname, $user->lname) }} </p>      
                <p>Email : {{ $user->email }} </p>  
                <address>
                    city : {{ $user->city }}<br>
                    state : {{ $user->state }}<br>
                    zip : {{ $user->zip }}<br>
                    country : {{ $user->country }}<br>
                </address>    
                <p>User Level : {{ userType($user->user_level) }} </p>      
            </div>
            @if ($user->posts)
                <div class="well">
                    <legend>Posts</legend>
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($user->posts as $post)
                                <tr>
                                    <td> <a href="{{ url('posts/'. $post->id) }}">{{ $post->title }}</a> </td>
                                    <td> {{ excerpt($post->content) }} </td>
                                </tr>
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            @endif
            @if ($user->comments)
                <div class="well">
                    <legend>Comments</legend>
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($user->comments as $comment)
                                <tr>
                                    <td><a href="{{ url('comments/'. $comment->id) }}">{{ $comment->title }}</a></td>
                                    <td>{{ excerpt($comment->body) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
    	@else
    		<p class="text-center"><strong>Not Found!</strong></p>
    	@endif
    </div>
  </div>
@endsection