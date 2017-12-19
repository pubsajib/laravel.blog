@extends('main')
@section('title', 'User')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center">{{ $user->name }} Details</h1>
    	@if ($user)
    		<div class="well">
                <legend>User details <a href="{{ route('user.edit', $user->id) }}">Edit</a></legend>
                <p>Name : {{ $user->name }} </p>      
                <p>Email : {{ $user->email }} </p>      
                <p>User Level : {{ $user->user_level ? 'User' : 'Admin' }} </p>      
            </div>
            @if ($user->posts)
                <div class="well">
                    <legend>Posts</legend>
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($user->posts as $post)
                                <tr>
                                    <td> {{ $post->title }} </td>
                                    <td> {{ $post->content }} </td>
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
                                    <td>{{ $comment->title }}</td>
                                    <td>{{ $comment->body }}</td>
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