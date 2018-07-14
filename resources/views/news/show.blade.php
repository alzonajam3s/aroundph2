@extends('layouts.app')

@include('partials.meta_static')

@section('content')
	<div class="container">
		<div class="jumbotron color1 tex-center">
			<h1 class=""><strong>{{ $news->title }}</strong></h1>
			<span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $news->created_at->format('m/d/Y')}}</span>
			<span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $news->updated_at->diffForHumans()}}</span>
			<hr>
		</div>

		<div class="container">
			<div class="col-md-12">
				<p>{!! $news->body !!}</p>
			</div>
		</div>

		<hr>

	</div>                 

@endsection