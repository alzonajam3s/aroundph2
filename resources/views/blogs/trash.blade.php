@extends('layouts.dash')

@section('content')

		<div class="jumbotron color2">
			<h1><i class="fas fa-trash-alt"></i> Trashed Blogs</h1>
			Total Tashed Blogs: {{ $trashedBlogs->count() }}
		</div>

		@if($count= (count($trashedBlogs)> 0))
		    	
			@foreach($trashedBlogs as $key=>$blog)
				<div class="card">
					<div class="card-header color3">
						# {{++$key}} | {{$blog->title}}
					</div>
					<div class="card-body">
						<div class="form-group">
							<p class="card-text">{!!$blog->body!!}</p>
							<hr>
							{{-- restore --}}
							<div class="row text-center">
								<div class="col-md-6">
									<form action="{{ route('blogs.restore' , $blog->id) }}">
										{{-- {{ method_field('patch') }} --}}
										<button type="submit" class="btn btn-success mr-2">
										<i class="fas fa-reply-all"></i> Restore Blog
										</button>
										{{ csrf_field() }}
									</form>
								</div>
								<div class="col-md-6">
									{{-- permanent delete --}}
									<form action="{{ route('blogs.permanent-delete' , $blog->id) }}" method="post">
										{{ method_field('delete') }}
										<button type="submit" class="btn btn-danger mr-2">
										<i class="fas fa-trash-alt"></i> Remove Blog Permanently
										</button>
										{{ csrf_field() }}
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
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

@endsection