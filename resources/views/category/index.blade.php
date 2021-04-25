@extends('layouts.master')

@section('title')
	Category Index
@endsection

@section('container')
	<div class="container">

		@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
		@endif

		<div class="row">
			<div class="col-md-12">
				<a href="/category/create" class="btn btn-primary btn-lg">Create New Category</a>
				<table class="table">
					<thead>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						@foreach($categories as $category)

							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
								<td>{{$category->details}}</td>
								<td>
									<a href="/category/edit/{{$category->id}}" class="btn btn-warning">Edit</a> | 

									<form method="post" action="/category/destroy">
										@csrf()
										<input type="text" hidden name="id" value="{{$category->id}}">
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</td>
							</tr>

						@endforeach
							
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection