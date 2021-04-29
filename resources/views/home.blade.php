@extends('layouts.master')

@section('title')
	Home
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
			<div class="col-md-12">
				
			</div>
		</div>
	</div>
@endsection
