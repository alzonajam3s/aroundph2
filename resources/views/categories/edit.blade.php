@extends('layouts.dash')

@section('content')


		<div class="jumbotron color3">
			<h1><i class="fas fa-pencil-alt"></i> Update Category</h1>
		</div>

		@include('partials.error_message')
		
		<form action="{{ route('categories.update' , $category->id) }}" method="post">
			{{ method_field('patch') }}
			<div class="card text-center">
				<div class="card-header color2">
					<h1>Category Name</h1>
				</div>
				<div class="card-body">
					<div class="form-group col-md-8 offset-md-2">
						<input type="text" name="name" class="form-control" value="{{ $category->name }}">
					</div>
					<button class="btn btn-primary" type="submit">Update Category</button>
					{{ csrf_field() }}
				</div>
				<div class="card-footer text-muted color2">

				</div>
			</div>
		</form>


@endsection