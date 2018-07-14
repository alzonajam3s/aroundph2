@extends('layouts.app')

@include('partials.meta_static')

@section('content')
{{-- CAROUSEL --}}
<div class="container-fluid">
	<section id="demos">
		<div class="row">
			<div class="owl-carousel owl-theme">
				@foreach($carousels as $carousel)
					<div class="item">
						<img src="/images/carousel_image/{{ $carousel->image_name }}">
					</div>
				@endforeach
			</div>
		</div>
	</section>
</div>

<div class="container card-header">
	<p class="lead">
		The Philippines (/ˈfɪləpiːnz/ (About this sound listen) FIL-ə-peenz; Filipino: Pilipinas [ˌpɪlɪˈpinɐs] or Filipinas [ˌfɪlɪˈpinɐs]), officially the Republic of the Philippines (Filipino: Republika ng Pilipinas),[a] is a unitary sovereign and archipelagic country in Southeast Asia. Situated in the western Pacific Ocean, it consists of about 7,641 islands[19] that are categorized broadly under three main geographical divisions from north to south: Luzon, Visayas, and Mindanao. The capital city of the Philippines is Manila and the most populous city is Quezon City, both part of Metro Manila.[20] Bounded by the South China Sea on the west, the Philippine Sea on the east and the Celebes Sea on the southwest, the Philippines shares maritime borders with Taiwan to the north, Vietnam to the west, Palau to the east and Malaysia and Indonesia to the south.
	</p>
	<div class="text-center"><a class=" lead" href="{{ route('pages.aboutme') }}"> Know more about us</a></div>
</div>
                          
 
<div class="row mt-5">
	<div class="col-md-9">
		<div class="">
			<h3 class="text-center"><i class="fab fa-blogger-b"></i> BLogs</h3>
  		</div>
	    <div class="container">
	    	@if (count($blogs))
				@foreach($blogs as $blog)
					<div class="mb-4">
						<div class="card-header text-center">
							<h2><a class="text-dark" href="{{ route('blogs.show', $blog->id) }}">{{ ucfirst($blog->title) }}</a></h2>
						</div>
						<div class="card-body">
							@if($blog->featured_image)
								<div class="text-center ">
									<img class="img-fluid filimit shadowman imagee" src="/images/featured_image/{{ $blog->featured_image ? $blog->featured_image : '' }}" alt="{{ str_limit($blog->title , 50)}}" >
								</div>
							@endif
							<p>{!! str_limit($blog->body , 400) !!}</p>
							<div class="text-right">
								<a href="{{ route('blogs.show' , $blog->id) }}" class="btn color3 lead ml-2 text-dark"> <i class="fas fa-hand-point-right"></i> Continue Reading</a>
							</div>
						</div>
						<div class="card-footer text-muted">
							@if($blog->user)
								<span class="mr-2"><i class="far fa-bookmark"></i> By: <a href="{{ route('users.show' , $blog->user->name) }}">{{ ucfirst($blog->user->name) }}</a></span>
								@foreach($blog->category as $category)
									<span class="mr-2"><i class="far fa-list-alt"></i> Location:<a href="{{ route('categories.show' , $category->slug) }}"> {{ ucfirst($category->name) }}</a></span>
								@endforeach
								<span class="mr-2"><i class="far fa-clock"></i> Created at: {{ $blog->created_at->format('m/d/Y')}}</span>
								<span class="mr-2"><i class="far fa-clock"></i> Last Update: {{ $blog->updated_at->diffForHumans()}}</span>	
							@endif
						</div>
					</div>
					<hr>
				@endforeach
			@else
				<div class="container-fluid">
					<div class="jumbotron color2 text-center">
						<h1><strong>No Record Found!</strong></h1>
						<p class="lead">Updating Soon</p>
					</div>
				</div>
			@endif
			<div class="offset-md-5">
				{!! $blogs->links() !!}
			</div>
		</div>
	</div>

	<div class="col-md-3">
		{{-- DESTINATIONS --}}
		<div class="container">
			<div class="">
				<h3 class="text-center"><i class="fas fa-map-marked-alt"></i> Destinations</h3>
	  			<img class="card-img-top img-fluid imagee" src="/images/featured_image/ph2.png" alt="Card image cap">
	  		</div>
	  		<div class="card-body">
	  			@if (count($categories))
			    	@foreach($categories as $category)
						<h4 class="text-right ">
							<a class="text-dark" href="{{ route('categories.show' , $category->slug) }}">{{ucfirst($category->name)}} <i class="fas fa-map-marker-alt"></i></a>
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
				<div class="card-footer">
				</div>
			</div>
		</div>
		{{-- NEWS --}}
		<div class="container">
			<div class="">
				<h3 class="text-center"><i class="far fa-newspaper"></i> NEWS</h3>
	  		</div>

		    @if (count($newss))
			    @foreach ($newss as $news)
					<div id="accordion">
						<div class="">
							<div class="card-header text-center" id="heading{{ $news->id }}">

								<button class="btn btn-link " data-toggle="collapse" data-target="#collapse{{ $news->id }}" aria-expanded="true" aria-controls="collapse{{ $news->id }}">
								{{ str_limit($news->title, 50)}} 
								<br>
								Posted: {{ $news->created_at->diffForHumans() }}
								</button>

							</div>

							<div id="collapse{{ $news->id }}" class="collapse" aria-labelledby="heading{{ $news->id }}" data-parent="#accordion">
								<div class="card-body">
									<p>{!! str_limit($news->body,200) !!}</p> <a href="{{ route('news.show' , $news->id) }}">Read More</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="container-fluid">
					<div class="jumbotron color2 text-center">
						<h1><strong>No Record Found!</strong></h1>
						<p class="lead">Updating Soon</p>
					</div>
				</div>
			@endif
			<div class="card-footer text-center">
				<a href="{{ route('news.index') }}">Check More News</a>
			</div>
		</div>                  

		{{-- ARTICLES --}}
		<div class="container mt-4">
			<div class="">
				<h3 class="text-center"><i class="fas fa-clipboard-list"></i> ARTICLES</h3>
	  		</div>

		    @if (count($articles))
			    @foreach ($articles as $article)
					<div id="accordion">
						<div class="">
							<div class="card-header text-center" id="heading{{ $article->id }}">

								<button class="btn btn-link " data-toggle="collapse" data-target="#collapse{{ $article->id }}" aria-expanded="true" aria-controls="collapse{{ $article->id }}">
								{{ str_limit($article->title, 50)}} 
								<br>
								Posted: {{ $article->created_at->diffForHumans() }}
								</button>

							</div>

							<div id="collapse{{ $article->id }}" class="collapse" aria-labelledby="heading{{ $article->id }}" data-parent="#accordion">
								<div class="card-body">
									<p>{!! str_limit($article->body,200) !!}</p> <a href="{{ route('articles.show' , $article->id) }}">Read More</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="container-fluid">
					<div class="jumbotron color2 text-center">
						<h1><strong>No Record Found!</strong></h1>
						<p class="lead">Updating Soon</p>
					</div>
				</div>
			@endif
			<div class="card-footer text-center">
				<a href="{{ route('articles.index') }}">Check More Article</a>
			</div>
		</div> 
	</div>
</div>
                          
<div class="container-fluid">
	<img class="img-fluid" src="/images/featured_image/aroundPH.png">
</div>


@endsection