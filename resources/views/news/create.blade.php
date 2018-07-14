@extends('layouts.dash')

@section('content')

		<div class="jumbotron color3">
			<h1><i class="fas fa-plus-square"></i> Create news</h1>
		</div>

		<div class="col-md-12">
			<form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">

				@include('partials.error_message')

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" required>
				</div>

				<div class="form-group" id="">
					<label for="body">Body</label>
					<textarea id="my-editor" name="body" class="form-control" required>{!! old('body') !!}</textarea>
				</div>

				<button class="btn btn-primary" type="submit"> <i class="fas fa-plus-square"></i> Add News</button>			

				{{ csrf_field() }}
			</form>		
		</div>
	</div>

	

@endsection