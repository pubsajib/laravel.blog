@extends('main')
@section('title', 'All pos')
@section('content')
  <div class="row">
  	<div class="col-sm-10"><h1>All Comments</h1></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th> # </th>
    				<th> Title </th>
                    <th> Content </th>
                    <th> Post </th>
                    <th> Author </th>
    				<th> Is Active </th>
    				<th> Actions </th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach( $comments as $comment )
    				<tr>
    					<th> {{ $comment->id }} </th>
                        <td> <a href="{{ route('comments.show', $comment) }}"> {{ $comment->title }} </a></td>
                        <td> {{ substr( $comment->body, 0, 50) }} </td>
                        <td> {{ $comment->post->title }} </td>
                        <td> {{ $comment->author->name }} </td>
                        <td> {{ $comment->is_approved ? 'Approved' : 'Not Approved' }} </td>
    					<td style="width: 120px;">
							<table>
								<tr>
									<td>{!! Html::linkRoute('comments.edit', 'Edit', array($comment->id), array('class'=>'btn btn-xs btn-primary')) !!}</td>
									<td>
										{!! Form::open(['method'=>'delete', 'route'=>['comments.destroy', $comment->id], 'class'=>'pull-right']) !!}
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
    </div>
  </div>
@endsection