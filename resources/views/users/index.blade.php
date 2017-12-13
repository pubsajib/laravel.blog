@extends('main')
@section('title', 'Post')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center">Tags</h1>
    	@if ($users)
    		<table class="table table-bordered table-hover">
    			<thead>
    				<tr>
    					<th>Name</th>
    					<th class="text-center" style="width: 125px;">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach ($users as $user)
    				<tr>
    					<td> <a href="{{ route('user.show', $user) }}">{{ $user->name }}</a> </td>
    					<td> 
							{!! Html::linkRoute('user.edit', 'Edit', ['id'=>$user->id], ['class'=>'btn btn-xs btn-primary']) !!}
							{!! Form::open(['method'=>'delete', 'route'=>['user.destroy', $user->id], 'class'=>'pull-right']) !!}
								{!! Form::submit('Delete', ['class'=>'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}
    					</td>
    				</tr>
    				@endforeach
    			</tbody>
    		</table>
    	@else
    		<p class="text-center"><strong>Not Found!</strong></p>
    	@endif
    </div>
  </div>
@endsection