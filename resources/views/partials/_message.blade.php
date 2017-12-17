@if (Session::has('success'))
	<div class="alert alert-success">
	  <strong>Success!</strong> {{ Session::get('success') }}
	</div>
@endif

@if (Session::has('error'))
	<div class="alert alert-danger">
	  <strong>Error!</strong> 
		  <ul>
		  	<li>{{ Session::get('error') }}</li>
		  </ul>
	</div>
	</div>
@endif

@if ( count($errors) > 0 )
	<div class="alert alert-danger">
	  <strong>Error!</strong> 
		  <ul>
		  @foreach ( $errors->all() as $error )
		  	<li>{{ $error }}</li>
		  @endforeach
		  </ul>
	</div>
@endif