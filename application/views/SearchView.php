<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php asset_url('assets/css/mystyling.css'); ?>" type="text/css"/>
		<link rel="stylesheet" href="<?php asset_url('assets/css/reset.css'); ?>" type="text/css" />


	</head>
	<body>

		<button><a href='Submit' class='PlainLink'>I want to submit a new gif!</a></button>
		<br />
		<br />
		<br />
		<h1>Search for a gif!</h1>
		<h3>[put spaces inbetween tags]</h3>
		<form method='post' action='Search'>
			<input type='text' name='image_url' />
			<input type='submit' />
		</form>



	</body>
</html>