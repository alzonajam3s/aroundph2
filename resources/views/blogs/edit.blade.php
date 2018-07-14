@extends('layouts.dash')

@section('content')

		<div class="jumbotron color2">
			<h1><i class="fas fa-edit"></i> Edit | <a href="{{ route('blogs.show', $blog->id) }}" target="_blank">{{ $blog->title }}</a></h1>
		</div>

		<div class="col-md-12">
			<form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
				{{ method_field('patch') }}

				@include('partials.error_message')
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea id="my-editor" name="body" class="form-control">{{ $blog->body }}</textarea>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-5">
							<label for="location">Location</label>
							<select class="form-control" name="category_id">
								@foreach($blog->category as $category)
									<option value="{{ $category->id }}" selected="{{ ucfirst($category->name) }}" >{{ $category->name }}</option>
								@endforeach
								@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-5">
							<label for="featured_image">Featured Image</label>
							<input type="file" name="featured_image" class="form-control" value="{{ $blog->featured_image }}">
						</div>
						<div class="col-md-2 text-center">
							<br>
							<button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Update Blog</button>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
			</form>		
		</div>

@endsection