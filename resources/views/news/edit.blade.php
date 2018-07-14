@extends('layouts.dash')

@section('content')

		<div class="jumbotron color2">
			<h1><i class="fas fa-edit"></i> Edit | <a href="{{ route('news.show', $news->id) }}" target="_blank">{{ $news->title }}</a></h1>
		</div>

		<div class="col-md-12">
			<form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
				{{ method_field('patch') }}

				@include('partials.error_message')
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea id="my-editor" name="body" class="form-control">{{ $news->body }}</textarea>
				</div>

				<button class="btn btn-primary" type="submit"><i class="fas fa-edit"></i> Update News</button>
				{{ csrf_field() }}
			</form>		
		</div>

@endsection