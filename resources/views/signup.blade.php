@extends('layouts.master')

@section('title')
	Signup
@endsection

@push('css')
    <style type="text/css">
    	
    </style>
@endpush

@section('container')
	<div class="container">

		@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
		@endif

		<div class="row">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<form method="post" action="/signup">
					@csrf()
					<div class="input-group mb-3 mt-5">
						<label for="name" class="input-group-text">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="input-group mb-3 mt-5">
						<label for="email" class="input-group-text">Email</label>
						<input type="text" name="email" id="email" class="form-control">
					</div>
					<div class="input-group mb-3 mt-5">
						<label for="password" class="input-group-text">Password</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary">Signup</button>
				</form>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
	</div>
@endsection
