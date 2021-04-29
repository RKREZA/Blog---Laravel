@extends('layouts.master')

@section('title')
	Category Create
@endsection

@push('css')
    <style type="text/css">
    	body{
    		background-color: blue;
    	}
    </style>
@endpush

@section('container')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<form method="post" action="/category/store">
					@csrf()
					<div class="input-group mb-3 mt-5">
						<label for="name" class="input-group-text">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="input-group mb-3">
						<label for="details" class="input-group-text">Details</label>
						<input type="text" name="details" id="details" class="form-control">
					</div>
					<div class="input-group mb-3">
						<label for="slug" class="input-group-text">Slug</label>
						<input type="text" name="slug" id="slug" class="form-control">
					</div>

					<button type="submit" class="btn btn-success btn-lg">Save</button>
				</form>

			</div>
		</div>
	</div>

@endsection