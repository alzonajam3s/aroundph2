@extends('layouts.dash')

@section('content')

	<div class="jumbotron bg-warning">
		<h1><i class="fas fa-image"></i> Add Image to Carousel</h1>
	</div>
		
	@include('partials.error_message')
	<div class="row text-center">
		<div class="col-md-6 offset-md-3">
			<form action="{{ route('carousel.store') }}" method="post" class="form-control color2"  enctype="multipart/form-data">
				<label for="image_name">Carousel Image</label>
				<input type="file" name="image_name" class="form-control" required>
				
				<button class="btn btn-primary" type="submit">
					<i class="fas fa-plus-circle"></i> Add an Image</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div>

	<br>
	<hr>
	<br>
	@if($count= (count($carousels)> 0))

		<div class="jumbotron bg-warning">
			<h1><i class="fas fa-file-image"></i> Carousel Image List </h1>
			Total Images: {{ $carousels->count() }}
		</div>

	    <table class="table table-hover">
	    <thead>
	   		<th>#</th>
	    	<th>Image</th>
	    	<th>Date Created</th>
	    	<th>Delete</th>
	    </thead>
	    <tbody>
	    	
			@foreach($carousels as $key=>$carousel)
			      
	            <tr class="danger">
	            	<td>{{++$key}}</td>
	                <td><img class="macwidth" src="/images/carousel_image/{{ $carousel->image_name }}"></td>
	                <td>{{ $carousel->created_at->diffForHumans() }}</td>
					<td>
						<form action="{{ route('carousel.destroy' , $carousel->id) }}" method="post">
							{{ method_field('delete') }}
							<button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Delete</button>
							{{ csrf_field() }}
						</form>
				    </td>	
	            </tr>
	        @endforeach
		</tbody>
	    </table>
    @else
		<div class="container-fluid">
			<div class="jumbotron color2 text-center">
				<h1><strong>No Record Found!</strong></h1>
				<p class="lead">Updating Soon</p>
			</div>
		</div>
	@endif

@endsection