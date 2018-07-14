@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')
	<div class="container">
		<div class="jumbotron color1">
			<h1 class="text-center">{{ $blog->title }}</h1>
			<hr>
			@if($blog->user)
				<div class="text-center lead mb-2">
					<span class="mr-2"><i class="far fa-bookmark"></i> By: <a href="{{ route('users.show' , $blog->user->name) }}">{{ ucfirst($blog->user->name) }}</a></span>
					@foreach($blog->category as $category)
						<span class="mr-2"><i class="far fa-list-alt"></i> Location:<a href="{{ route('categories.show' , $category->slug) }}"> {{ ucfirst($category->name) }}</a></span>
					@endforeach
					<span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $blog->created_at->format('m/d/Y')}}</span>
					<span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $blog->updated_at->diffForHumans()}}</span>
				</div>	
			@endif
			<div class="col-md-12">
				@if($blog->featured_image)
				<div class="text-center">
					<img class="img-fluid filimit imagee" src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title , 50)}}">
				</div>
				@endif
			</div>
		</div>

		<div class="col-md-12">
			<p>{!! $blog->body !!}</p>
		</div>

		<hr>

		<aside>
			<div id="disqus_thread"></div>
			<script>
				(function() { 
				var d = document, s = d.createElement('script');
				s.src = 'https://aroundph.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
				})();
			</script>
			
		</aside>   
		</div>                 

@endsection