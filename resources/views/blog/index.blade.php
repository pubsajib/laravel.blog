@extends('main')
@section('title', 'Blog')

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
      @foreach ($posts as $post)
        <div class="post">
          <h3>{!! Html::linkRoute('posts.show', $post->title, [$post->id] ) !!}</h3>
          <p>{{ excerpt($post->content) }}</p>
          @if ( strlen(strip_tags($post->content)) > 50 )
            {!! Html::linkRoute('blog.single', 'Read More', [$post->slug], ['class'=>'btn btn-primary']) !!}
          @endif
        </div><hr>
      @endforeach
      <div class="text-center"> {{ $posts->links() }} </div>
    </div>

    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
@endsection