@extends('layouts.dash')

@section('content')


		<div class="jumbotron color3">
			<h1><i class="fas fa-pen-nib"></i> Manage Blogs</h1>
			Total Blogs: {{ $publishedBlogs->count() + $draftBlogs->count() }}
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="container bg-warning text-center">
					<br>
					<h3><strong> Published Blogs </strong></h3>
					Total Published Blogs {{ $publishedBlogs->count() }}
					<hr>
				</div>
				@if($count= (count($publishedBlogs)> 0))	    	
					@foreach($publishedBlogs as $key=>$blog)
					<form action="{{ route('blogs.publishedupdate', $blog->id) }}" method="post" enctype="multipart/form-data">
										{{ method_field('patch') }}
						<div class="card">
							<h5 class="card-header"># {{++$key}} | <a href="{{ route('blogs.show', [$blog->id]) }}" target="_blank">{{$blog->title}}</a></h5>
							<div class="card-body">
								<p class="card-text">{!! str_limit($blog->body, 100) !!}</p>
								<div class="text-right">
									
											<input name="status" value="0" hidden>
											<button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save as Draft</button>
								
								</div>
							</div>
						</div>
					<br>
					{{ csrf_field() }}
					</form>
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

			<div class="col-md-6">
				<div class="container bg-warning text-center">
					<br>
					<h3><strong> Draft Blogs </strong></h3>
					Total Draft Blogs {{ $draftBlogs->count() }}
					<hr>
				</div>
				@if($count= (count($draftBlogs)> 0))	    	
					@foreach($draftBlogs as $key=>$blog)
					<form action="{{ route('blogs.updatedraft', $blog->id) }}" method="post"  enctype="multipart/form-data">
						{{ method_field('patch') }}
						<div class="card">
							<h5 class="card-header"># {{++$key}} | <a href="{{ route('blogs.show', [$blog->id]) }}" target="_blank">{{$blog->title}}</a></h5>
							<div class="card-body">
								<p class="card-text">{!! str_limit($blog->body, 100) !!}</p>
								<div class="text-right">
										
											<input name="status" value="1" hidden>
											<button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Publish Draft</button>
										
									
								</div>
							</div>
						</div>
						{{ csrf_field() }}
					</form>
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
		</div>

@endsection