@extends('main')
@section('title', 'Category')
@section('content')
  <div class="row">
    <div class="col-md-12">
      	<div class="row">
      		<div class="col-sm-8"><h1>{{ $category->name }} Category</h1></div>
      		<div class="col-sm-4"><a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg btnSpacing">View All</a></div>
      	</div>
      	@if(count($category->posts) > 0)
      		<table class="table table-bordered table-hover">
      			<thead>
      				<tr> 
      					<th>Name</th> 
      					<th>Content</th> 
      				</tr>
      			</thead>
      			<tbody>
      				@foreach( $category->posts as $post ) 
      				<tr> 
      					<td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td> 
      					<td>{!! excerpt($post->content, 200) !!}</td> 
      				</tr>
      				@endforeach
      			</tbody>
      		</table>
      	@else
      		<h3 class="text-danger">No posts found!</h3>
      	@endif
    </div>
    </div>
  </div>
@endsection