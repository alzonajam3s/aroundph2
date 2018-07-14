@extends('layouts.app')

@include('partials.meta_static')

@section('content')
	<h1 class="text-center color4 text-dark padpad2 mb-5">
	 - - - - - - - - - - - - - - <i class="fas fa-newspaper"></i> Recent News - - - - - - - - - - - - - - 
	</h1>
	<div class="container-fluid">
		@if (count($newss))
			@foreach($newss as $news)
			<div class="container">
				<h3 class="text-center"><a href="{{ route('news.show' , $news->id) }}">{{ $news->title}}</a></h3>
			    <p>{!! str_limit($news->body , 200) !!}</p>
			    <div class="text-right mb-2">
					<a href="{{ route('news.show' , $news->id) }}" class="btn color3 lead ml-2 text-dark"> <i class="fas fa-hand-point-right"></i> Continue Reading</a>
				</div>
				<div class="card-footer text-muted">
					<span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $news->created_at->format('m/d/Y')}}</span>
					<span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $news->updated_at->diffForHumans()}}</span>	
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


@endsection