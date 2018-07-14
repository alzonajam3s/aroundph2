@extends('layouts.app')

@include('partials.meta_static')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header color2 text-center">
                	<h3><i class="fas fa-user-tie"></i> My Profile</h3>
            	</div>
                {{-- DISPLAY AREA --}}
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Username : </label>
                            <div class="col-md-6">
                            	<h4>{{ Auth::user()->name }}</h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email Address : </label>
                            <div class="col-md-6">
                            	<h4>{{ Auth::user()->email }}</h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Role : </label>
                            <div class="col-md-6">
                            	<h4>{{ Auth::user()->role->name }}</h4>
                            </div>
                        </div>
                        {{-- EDIT BUTTON --}}
						<div class="col-md-12 text-center">
							<div class="btn-group">
								<a href="{{ route('pages.editprofile' , Auth::User()->id ) }}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i> Edit Profile</a>
							</div>
						</div>
                    </form>
                    <br>
                    {{-- DELETE BUTTON --}}
                    <div class="col-md-12 text-center">
                        @if(Auth::user()->id === 1)
    	                    <form>
								<button type="submit" class="btn btn-danger mr-2" disabled><i class="far fa-trash-alt"></i> Delete Profile</button>
    						</form>
                        @else
                            <form action="{{ route('pages.deleteprofile' , Auth::User()->id ) }}" method="post">
                                {{ method_field('delete') }}
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mr-2"><i class="far fa-trash-alt"></i> Delete Profile</button>
                                {{ csrf_field() }}
                            </form>
                        @endif
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection