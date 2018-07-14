<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
	<img src="<?php echo $message->embed('images/featured_image/aroundPH2.png'); ?>" style="max-width: 80%;padding-top: 20px;">
	<hr>
 	 <img align="center" src="<?php echo $message->embed('images/featured_image/'.$blog->featured_image);?>" style="max-width: 900px;">

	<br>
	<p class="lead text-center">Hello! {{ $user->name }}</p>
	<br>
	<p>A new blog titled "{{$blog->title}}" has been published at aroundPH</p>
	<h3>Lorem Ipsum</h3>
	{!! str_limit($blog->body, 200) !!}
	<p>check our website now</p>
	<br>

	Thank you!
	<br>
	Team aroundPH
	<br>
	<?php echo'aroundphinfo@gmail.com'?>
	<br>
	<img src="<?php echo $message->embed('images/featured_image/jeep.png'); ?>" style="max-width: 80%;padding-top: 20px;">
</body>
</html>