@extends('main')
@section('title', 'Messages')
@section('content')
  <div class="row">
  	<div class="col-sm-10"><h1>All Messages</h1></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    	<table class="table table-hover">
    		<thead>
    			<tr>
    				<th> # </th>
    				<th> Name </th>
                    <th> Email </th>
                    <th> Subject </th>
                    <th> Body </th>
    				<th> Actions </th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach( $messages as $message )
    				<tr>
    					<th> {{ $message->id }} </th>
                        <td> <a href="{{ route('messages.show', $message) }}"> {{ $message->name }} </a></td>
                        <td> {{ $message->email }} </td>
                        <td> {{ $message->subject }} </td>
                        <td> {{ excerpt($message->body) }} </td>

    					<td style="width: 120px;">
							<table>
								<tr>
									{{-- <td>{!! Html::linkRoute('comments.edit', 'Edit', array($message->id), array('class'=>'btn btn-xs btn-primary')) !!}</td> --}}
									<td>
										{!! Form::open(['method'=>'delete', 'route'=>['comments.destroy', $message->id], 'class'=>'pull-right']) !!}
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