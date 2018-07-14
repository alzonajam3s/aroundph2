<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h2> aroundPH - You received a new message from "{{ $name }}"</h2>
	<hr>
	<div>
		<p class="lead">Name : {{ $name }}</p>
		<p class="lead">Email : {{ $email }}</p>
		<p class="lead">Subject : {{ $subject }}</p>
		<p class="lead">Message :</p>
		<p class="lead">{{ $mail_message }}</p>
		
	</div>

</body>
</html>