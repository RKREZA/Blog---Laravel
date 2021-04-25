@extends('layouts.master')

@section('title')
	Category Edit
@endsection

@section('container')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<form method="post" action="/category/update">
					@csrf()
					<input type="text" hidden name="id" value="{{$category->id}}">
					<div class="input-group mb-3 mt-5">
						<label for="name" class="input-group-text">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
					</div>
					<div class="input-group mb-3">
						<label for="details" class="input-group-text">Details</label>
						<input type="text" name="details" id="details" class="form-control" value="{{$category->details}}">
					</div>
					<div class="input-group mb-3">
						<label for="slug" class="input-group-text">Slug</label>
						<input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}">
					</div>

					<button type="submit" class="btn btn-success btn-lg">Update</button>
				</form>

			</div>
		</div>
	</div>

@endsection