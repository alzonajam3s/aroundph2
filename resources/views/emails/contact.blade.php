@extends('layouts.app')

@include('partials.meta_static')

@section('content')
<div class="text-center color4 padpad2">
	<h1 class="text-white"> Email : <?php echo'alzona.jam3s@gmail.com' ?></h1>
</div>

<div class="row">
	{{-- CONTACT FORM --}}
	<div class="col-md-6">
		<div class="card-header text-center">
			<h1><i class="far fa-envelope"></i> Contact Us:</h1>
		</div>
		<div class="col-md-10 offset-md-1">
			<form action="{{ route('mail.send') }}" method="post">
				@include('partials.error_message')
				<div class="form-group mt-3">
					<label for="title" class="lead">Name</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					<label for="email" class="lead">Email</label>
					<input type="email" name="email" class="form-control" value="{{ old('email') }}">
				</div>
				<div class="form-group">
					<label for="subject" class="lead">Subject</label>
					<input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
				</div>
				<div class="form-group">
					<label for="message" class="lead">Message</label>
					<textarea name="mail_message" class="form-control my-editor">
						{{ old('mail_message') }}
					</textarea>
				</div>
				<div class="text-right">
					<button class="btn btn-primary mb-2 " type="submit"><i class="fas fa-share-square"></i> Submit Inquiry</button>
				</div>
				{{ csrf_field() }}
			</form>		
		</div>
		<div class="card-footer">
		</div>
	</div>
	{{-- DIRECTIONS --}}
	<div class="col-md-6">
		<div class="card-header text-center">
			<h1><i class="fas fa-map-signs"></i> Directions</h1>
		</div>
		<div class="text-center mt-2 border">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3126.5787420026973!2d121.00285477826027!3d14.505752880540658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cebc2576ecfd%3A0x5360ca44f0181deb!2sNAIA+Terminal+1!5e0!3m2!1sen!2sph!4v1531245026502" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>



		


@endsection