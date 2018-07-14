@extends('layouts.dash')

@section('content')
{{-- ROW COUNT --}}
@if($count= (count($categories)> 0))
	<div class="jumbotron color3">
		<h1><i class="fas fa-certificate"></i> Category List </h1>
		Total Categories: {{ $categories->count() }}
	</div>
	{{-- TABLE --}}
    <table class="table table-hover">
    <thead>
   		<th>#</th>
    	<th>Category Name</th>
    	<th>Date Created</th>
    	<th>Update</th>
    	<th>Delete</th>
    </thead>
    <tbody>    	
		@foreach($categories as $key=>$category)		      
            <tr class="danger">
            	<form>
	            	<td>{{++$key}}</td>
	                <td><a href="{{ route('categories.show' , $category->slug) }}" target="_blank">{{ ucfirst($category->name)}}</a></td>
	                <td>{{ $category->created_at->diffForHumans() }}</td>
	            	<td>
	            		<a href="{{ route('categories.edit' , $category->id) }}" class="btn btn-primary ">
	            			<i class="fas fa-edit"></i> Update</a>
					</td>
            	</form>
				<td>
					<form action="{{ route('categories.destroy' , $category->id) }}" method="post">
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Delete</button>
						{{ csrf_field() }}
					</form>
			    </td>	
            </tr>
        @endforeach
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