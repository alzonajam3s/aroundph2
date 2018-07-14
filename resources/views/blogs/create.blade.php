@extends('layouts.dash')

@section('content')

		<div class="jumbotron color3">
			<h1><i class="fas fa-plus-square"></i> Create a new blog</h1>
		</div>

		<div class="col-md-12">
			<form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">

				@include('partials.error_message')

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" required>
				</div>

				<div class="form-group" id="">
					<label for="body">Body</label>
					<textarea id="my-editor" name="body" class="form-control" required>{!! old('body') !!}</textarea>
				</div>
 
				<div class="form-group">
					<div class="row">
						<div class="col-md-5">
							<label for="location">Location</label>
							<select class="form-control" name="category_id">
								<option selected="selected" required>Choose one</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" >{{ ucfirst($category->name) }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-5">
							<label for="featured_image">Featured Image</label>
							<input type="file" name="featured_image" class="form-control" required>
						</div>
					
						<div class="col-md-2 text-center">
							<br>

							<button class="btn btn-primary" type="submit"> <i class="fas fa-plus-square"></i> Create a New Blog</button>
						</div>
					</div>
				</div>


				

				{{ csrf_field() }}
			</form>		
		</div>
	</div>

	

@endsection