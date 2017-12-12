@extends('main')
@section('title', 'Homepage')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to My Blog!</h1>
        <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
      </div>
    </div>
  </div>
  <!-- end of header .row -->

  <div class="row">
    <div class="col-md-8">
      @if ($posts)
        @foreach ($posts as $post)
          <div class="post">
            <h3>{!! Html::linkRoute('posts.show', $post->title, [$post->id] ) !!}</h3>
            <p>{{ substr($post->content, 0, 200) }} {{ strlen($post->content) > 200 ? ' ...' : '' }} </p>
            @if ( strlen($post->content) > 200 )
              {!! Html::linkRoute('posts.show', 'Read More', [$post->id], ['class'=>'btn btn-primary']) !!}
            @endif
          </div><hr>
        @endforeach
      @else
        <h3 class="text-center text-danger">No posts found!</h3>
      @endif
    </div>

    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
@endsection