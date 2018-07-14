@extends('layouts.dash')

@section('content')
	
	<div class="jumbotron color3">
		@if(Auth::user() && Auth::user()->role_id === 1)
		<h1><i class="fas fa-clipboard-list"></i> Admin Dashboard</h1>
		@elseif(Auth::user() && Auth::user()->role_id === 2)
		<h1><i class="fas fa-clipboard-list"></i> Author Dashboard</h1>
		@endif
	</div>
{{-- BLOGS & CATEGORIES--}}
<div class="row">
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Blogs</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-align-left text-info fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $blogs->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('pages.myblogs' , Auth::User()->name) }}" class="btn btn-info">Visit Blogs</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Published Blogs</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-th text-secondary fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $publishedBlogs->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Visit Published Blogs</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Draft Blogs</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fab fa-blogger-b text-primary fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $draftBlogs->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('admin.blogs') }}" class="btn btn-primary">Visit Draft Blogs</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Categories</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fab fa-pied-piper text-dark fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $category->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('pages.catlist') }}" class="btn btn-dark">Visit Categories</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>	
</div>

    <br>
@if(Auth::user() && Auth::user()->role_id === 1)
{{-- USERS --}}
<div class="row">
	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Users</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-users text-dark fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $user->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('users.index') }}" class="btn btn-dark">Check Users</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Administrator</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-user-tie text-danger fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $admins->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('users.index') }}" class="btn btn-danger">Check Users</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Authors</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-user-cog text-success fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $authors->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('users.index') }}" class="btn btn-success">Check Users</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Subscribers</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-user-alt text-warning fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $subscribers->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('users.index') }}" class="btn btn-warning">Check Users</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>	
</div>

<br>
{{-- CAROUSEL, ARTICLE, NEWS --}}
<div class="row">
	<div class="col-md-3 mx-auto">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Carousel</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-align-left text-info fa-3x"></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $carousel->count() }}</h1>					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('carousel.index') }}" class="btn btn-info">Check Images</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3 mx-auto">
		<div class="card text-center">
			<div class="card-header">
			    <h3>News</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-newspaper fa-3x"></i></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $news->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('news.list') }}" class="btn btn-secondary">Visit News Section</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>

	<div class="col-md-3 mx-auto">
		<div class="card text-center">
			<div class="card-header">
			    <h3>Articles</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					<br>
					<i class="fas fa-clipboard-list fa-3x"></i></i>
				</div>
				<div class="col-md-6">
					<br>
					<h1 class="text-muted">	{{ $draftBlogs->count() }}</h1>
					
					{{-- <p class="text light">Total Blogs</p> --}}
				</div>
				
			</div>
			<a href="{{ route('admin.blogs') }}" class="btn btn-primary">Visit Articles Section</a>
			<div class="card-footer text-muted">	
			</div>	
		</div>
	</div>
</div>


@endif

@endsection