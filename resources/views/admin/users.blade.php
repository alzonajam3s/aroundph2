@extends('layouts.dash')

@section('content')
	
	<div class="jumbotron color3">
		<h1><i class="fas fa-user-tag"></i> Manage users</h1>
		<p>
			<strong>Total Users :</strong> {{ $users->count() }}   |
			<strong>Administrators :</strong> {{ $admins->count() }}   |
			<strong>Authors :</strong> {{ $authors->count() }}   |
			<strong>Subscribers :</strong> {{ $subscribers->count() }}</p>
	</div>
	

	@if($count= (count($users)> 0))

    <table class="table table-hover">
    <thead>
   		<th>#</th>
    	<th>Name</th>
    	<th>Email</th>
    	<th>Role</th>
    	<th>Date Updated</th>
    	<th>Update</th>
    	<th>Delete</th>
    </thead>
    <tbody>
		@foreach($users as $key=>$user)
            <tr class="danger">
            	<form action="{{ route('users.update', $user->id) }}" method="post">
					{{ method_field('patch') }}
	            	<td>{{++$key}}</td>
	                <td><a href="{{ route('users.show' , $user->name) }}" target="_blank">{{$user->name}}</a></td>
	                <td>{{ $user->email }}</td>
	                <td>
	                	@if($user->id === 1)
		          			<select name="role_id" class="form-control" disabled>
								<option selected>{{ $user->role->name}}</option>
							</select>
						@elseif ($user->id > 1)
		          			<select name="role_id" class="form-control">
								<option selected>{{ $user->role->name}}</option>
								@if($user->role->name === 'admin')
								<option value="1" hidden>Admin</option>
								<option value="2" >Author</option>
								<option value="3" >Subscriber</option>
								@endif
								@if($user->role->name === 'author')
								<option value="1" >Admin</option>
								<option value="2" hidden>Author</option>
								<option value="3" >Subscriber</option>
								@endif
								@if($user->role->name === 'subscriber')
								<option value="1" >Admin</option>
								<option value="2" >Author</option>
								<option value="3" hidden>Subscriber</option>
								@endif									
							</select>
						@endif  	
	                </td>
	                <td>{{ $user->updated_at->diffForHumans() }}</td>
	            	<td>
	            		<button class="btn btn-primary "><i class="fas fa-edit"></i> Update</button>
	            		{{ csrf_field() }}
					</td>
            	</form>
				<td>
				@if($user->id === 1)
					<form>
						<button type="submit" class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i> Delete</button>
					</form>
				@else
					<form action="{{ route('users.destroy' , $user) }}" method="post">
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i> Delete</button>
						{{ csrf_field() }}
					</form>
				@endif
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