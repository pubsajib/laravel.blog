@extends('main')
@section('title', 'All pos')
@section('content')
  <div class="row">
  	<div class="col-sm-10"><h1>All Posts</h1></div>
  	<div class="col-sm-2"><a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg btn-block btnSpacing">Create New Post</a></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th> # </th>
    				<th> Title </th>
    				<th> Content </th>
    				<th> Created At </th>
    				<th> Actions </th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach( $posts as $post )
    				<tr>
    					<th> {{ $post->id }} </th>
    					<td> {{ $post->title }} </td>
    					<td> 
    						{{ substr( $post->content, 0, 50) }} 
    						{{ strlen($post->content) > 50 ? '...' : '' }} 
    					</td>
    					<td> {{ date( 'M j, Y h:i A', strtotime($post->content) ) }} </td>
    					<td style="width: 120px;">
							<table>
								<tr>
									<td>{!! Html::linkRoute('posts.show', 'View', array($post->id), array('class'=>'btn btn-xs btn-default')) !!}</td>
									<td>{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-xs btn-primary')) !!}</td>
									<td>
										{!! Form::open(['method'=>'delete', 'route'=>['posts.destroy', $post->id], 'class'=>'pull-right']) !!}
										{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
										{!! Form::close() !!}
									</td>
								</tr>
							</table>
    					</td>
    				</tr>
    			@endforeach
    		</tbody>
    	</table>
		<div class="text-center"> {{ $posts->links() }} </div>
    </div>
  </div>
@endsection