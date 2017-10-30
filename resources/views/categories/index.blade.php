@extends('main')
@section('title', 'Post')
@section('content')
  <div class="row">
    <div class="col-md-8">
    	<h1 class="text-center">Categories</h1>
    	@if ($categories)
    		<table class="table table-bordered table-hover">
    			<thead>
    				<tr>
    					<th>Name</th>
    					<th class="text-center" style="width: 125px;">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				@foreach ($categories as $category)
    				<tr>
    					<td> {{ $category->name }} </td>
    					<td> 
							{!! Html::linkRoute('categories.edit', 'Edit', ['id'=>$category->id], ['class'=>'btn btn-xs btn-primary']) !!}
							{!! Form::open(['method'=>'delete', 'route'=>['categories.destroy', $category->id], 'class'=>'pull-right']) !!}
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
    <div class="col-md-4">
		<h1 class="text-center">Create New</h1>
    	<div class="well text-left">
    		{!! Form::open() !!}
    			{!! Form::label('name', 'Name') !!}
    			{!! Form::text('name', null, ['class'=>'form-control']) !!}
    			<br>
    			<p class="text-center">
    				{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
    			</p>
    		{!! Form::close() !!}
    	</div>
    </div>
  </div>
@endsection