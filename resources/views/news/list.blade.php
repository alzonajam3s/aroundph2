@extends('layouts.dash')

@section('content')
	<div class="jumbotron color3">
		<h1><i class="fas fa-certificate"></i> News List </h1>
		Total News: {{ $newss->count() }}
	</div>
@if($count= (count($newss)> 0))	
	{{-- TABLE --}}
    <table class="table table-hover">
    <thead>
   		<th>#</th>
    	<th>Title</th>
    	<th>Update Date</th>
    	<th>Update</th>
    	<th>Delete</th>
    </thead>
    <tbody>    	
		@foreach($newss as $key=>$news)		      
            <tr class="danger">
            	<form>
	            	<td>{{++$key}}</td>
	                <td><a href="{{ route('news.show' , $news->id) }}" target="_blank">{{ ucfirst($news->title)}}</a></td>
	                <td>{{ $news->updated_at->diffForHumans() }}</td>
	            	<td>
	            		<a href="{{ route('news.edit' , $news->id) }}" class="btn btn-primary ">
	            			<i class="fas fa-edit"></i> Update</a>
					</td>
            	</form>
				<td>
					<form action="{{ route('news.destroy' , $news->id) }}" method="post">
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