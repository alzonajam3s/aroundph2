@extends('layouts.app')

@include('partials.meta_static')

@section('content')


	<div class="row">
		<div class="col-md-3 offset-md-2">
			<hr>
				<h4 class="text-center"><i class="fas fa-plane-departure "></i> Philippine Destinations</h4>
			<hr>
			@if (count($categories))
				@foreach($categories as $category)
				<h4 class="text-right">
					<a href="{{ route('categories.show' , $category->slug) }}">{{ucfirst($category->name)}} <i class="fas fa-map-marker-alt"></i></a>
				</h4>
				@endforeach
			@else
				<div class="container-fluid">
					<div class="jumbotron color2 text-center">
						<h1><strong>No Record Found!</strong></h1>
						<p class="lead">Updating Soon</p>
					</div>
				</div>
			@endif
		</div>
		<div class="col-md-7">
			<div class="container-fluid">
				<img class="img-fluid imagee" src="/images/featured_image/ph2.png">
			</div>
		</div>
	</div>
					
	
@endsection