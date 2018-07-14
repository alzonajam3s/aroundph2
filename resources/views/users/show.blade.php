@extends('layouts.app')

@section('content')

	<h1 class="text-center color4 text-dark padpad2 mb-5">
	 - - - - - - - - - - - - - - {{ ucfirst($user->name) }}'s Recent Blogs - - - - - - - - - - - - - - 
	</h1>
	<div class="container-fluid">
		@if (count($user->blogs))
			@foreach($user->blogs as $blog)
			<div class="container">
				<h3 class="text-center"><a href="{{ route('blogs.show' , $blog->id) }}">{{ $blog->title}}</a></h3>
				@if($blog->featured_image)
				<div class="text-center">
					<img class="img-fluid filimit shadowman" src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title , 50)}}">
				</div>
				@endif
			    <p>{!! str_limit($blog->body , 200) !!}</p>
			    <div class="text-right mb-2">
					<a href="{{ route('blogs.show' , $blog->id) }}" class="btn color3 lead ml-2 text-dark"> <i class="fas fa-hand-point-right"></i> Continue Reading</a>
				</div>
				<div class="card-footer text-muted">
					<span class="mr-2"><i class="far fa-bookmark"></i> By: <a href="{{ route('users.show' , $blog->user->name) }}">{{ ucfirst($blog->user->name) }}</a></span>
					@foreach($blog->category as $category)
						<span class="mr-2"><i class="far fa-list-alt"></i> Categories:<a href="{{ route('categories.show' , $category->slug) }}"> {{ ucfirst($category->name) }}</a></span>
					@endforeach
					<span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $blog->created_at->format('m/d/Y')}}</span>
					<span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $blog->updated_at->diffForHumans()}}</span>	
				</div>
			</div>
			<br>
			<hr>
			<br>
			
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

@endsection()