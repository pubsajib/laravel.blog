@extends('main')
@section('title', 'Tag')
@section('content')
  <div class="row">
    <div class="col-md-8 col-sm-offset-2">
      	<div class="row">
      		<div class="col-sm-8"><h1>{{ $tag->name }} Tag <small> {{ $tag->posts()->count() }} Posts</small></h1></div>
      		<div class="col-sm-4"><a href="{{ route('tags.index') }}" class="btn btn-primary btn-lg btnSpacing">View All</a></div>
      	</div>
      	@if(count($tag->posts) > 0)
      		<table class="table table-bordered table-hover">
      			<thead>
      				<tr> 
      					<th>Name</th> 
      					<th>Tags</th> 
      				</tr>
      			</thead>
      			<tbody>
      				@foreach( $tag->posts as $post ) 
      				<tr> 
                <td>{{ $post->title }} <small>( {{ $post->tag()->count() }} )</small></td> 
      					<td>
                  @if( $post->tag )
                    @foreach( $post->tag as $currentPostTag )
                      <span style="margin-right: 5px;" class="label label-default"> {{ $currentPostTag->name }} </span>
                    @endforeach
                  @endif
                </td> 
      					{{-- <td>{{ $post->content }}</td>  --}}
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