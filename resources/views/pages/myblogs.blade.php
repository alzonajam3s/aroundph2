@extends('layouts.dash')

@section('content')
{{-- ROW COUNT --}}

<div class="jumbotron color3">
	<h1><i class="fab fa-blogger-b"></i> Blogs</h1>
	Total Blogs: {{ $blogs->count() }}
</div>


@if($count= (count($users)> 0))
    <table class="table table-hover">
    <thead>
   		<th>#</th>
    	<th>Title</th>
    	<th>Body</th>
    	<th>Location</th>
    	<th>Featured Image</th>
    	<th>Date Created</th>
    	<th>Date Updated</th>
    	<th>Update</th>
    	<th>Delete</th>
    </thead>
    <tbody>
    	{{-- ADMIN BLOG DISPLAY --}}
    	@if(Auth::user() && Auth::user()->role->name === 'admin')
			@foreach($blogs as $key=>$blog)
			<tr class="danger">
            	<form>
	            	<td>{{++$key}}</td>
	                <td><a href="{{ route('blogs.show' , $blog->id) }}" target="_blank">{{ str_limit($blog->title, 20) }}</a></td>
	                <td>{!! str_limit($blog->body, 100) !!}</td>
	                <td>
	                	@foreach($blog->category as $category)
	                	{{ ucfirst($category->name) }}
	                	@endforeach
	                </td>
	                <td><img class="macwidth" src="/images/featured_image/{{ $blog->featured_image }}"></td>
	                <td>{{ $blog->created_at->format('m/d/Y') }}</td>
	                
	                <td>{{ $users->updated_at->diffForHumans() }}
	                	{{ $blog->id }}
	                </td>
	            	<td>
	            		<a href="{{ route('blogs.edit' , $blog) }}" class="btn btn-primary ">
	            			<i class="fas fa-edit"></i> Update</a>
					</td>
            	</form>
				<td>
					<form action="{{ route('blogs.delete' , $blog->id) }}" method="post">
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Delete</button>
						{{ csrf_field() }}
					</form>
			    </td>	
            </tr>
        	@endforeach
		@endif
		{{-- AUTHOR BLOG DISPLAY --}}
     	@if(Auth::user() && Auth::user()->role->name === 'author')
			@foreach($users->blogs as $key=>$blog)
		      
            <tr class="danger">
            	<form>
	            	<td>{{++$key}}</td>
	                <td><a href="{{ route('blogs.show' , $blog->id) }}" target="_blank">{{ str_limit($blog->title, 20) }}</a></td>
	                <td>{!! str_limit($blog->body, 100) !!}</td>
	                <td>
	                	@foreach($blog->category as $category)
	                	{{ ucfirst($category->name) }}
	                	@endforeach
	                </td>
	                <td><img class="macwidth" src="/images/featured_image/{{ $blog->featured_image }}"></td>
	                <td>{{ $blog->created_at->format('m/d/Y') }}</td>
	                
	                <td>{{ $users->updated_at->diffForHumans() }}</td>
	            	<td>
	            		<a href="{{ route('blogs.edit' , $blog) }}" class="btn btn-primary ">
	            			<i class="fas fa-edit"></i> Update</a>
					</td>
            	</form>
				<td>
					<form action="{{ route('blogs.delete' , $blog->id) }}" method="post">
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Delete</button>
						{{ csrf_field() }}
					</form>
			    </td>	
            </tr>
        @endforeach
        @endif
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