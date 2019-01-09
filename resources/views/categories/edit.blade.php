@extends('main')
@section('title', 'Category')
@section('content')
  <div class="row">
    <div class="col-md-6 col-sm-offset-3">
		<h1 class="text-center">Edit Category</h1>
    	<div class="well text-left">
    		<form action="{{ route('categories.update', $category->id) }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primay btn-block" type="submit"> save </button>
                </div>
            </form>
    	</div>
    </div>
  </div>
@endsection