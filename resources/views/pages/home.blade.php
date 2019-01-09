@extends('main')
@section('title', 'Homepage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to My Blog!</h1>
                <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                <p class="hidden"><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>
    </div>
    <!-- end of header .row -->
    <div class="row">
        <div class="col-md-8 postWrapper">
            @include('partials._loop')
            {{ $posts->links() }}
        </div>
        <div class="col-md-4"> @include('partials._sidebar') </div>
    </div>
@endsection