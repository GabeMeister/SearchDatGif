<!DOCTYPE html>
<html>
	<head>
		<title>Choose a Thumbnail</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="<?php echo asset_url('assets/css/mystyling.css'); ?>" type="text/css"/>
		<link rel="stylesheet" href="<?php echo asset_url('assets/css/reset.css'); ?>" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
<!--		<script>
			$(document).ready(function() {

				
				$("#Image1Thumbnail").click(function() {
					
				});
				
				$("#Image2Thumbnail").click(function() {
					
				});
				
				$("#Image3Thumbnail").click(function() {
					
				});
				
				
				
				
				
			});
		</script>-->
	</head>
	<body>

		
		
			
			
			
			
			
			
			
		<form method="post" action="Success" id="ThumbnailForm">
			<h1>Option 1:</h1>
			<input type="radio" name="UploadImage" id="image1" value="<?php echo $BeginImgUrlDir; ?>" /><label for="image1"><img src="<?php echo $BeginImgUrlDir; ?>" id="Image1Thumbnail" alt="Uhh...Whoops"/></label>
			<h1>Option 2:</h1>
			<input type="radio" name="UploadImage" id="image2" value="<?php echo $MidImgUrlDir; ?>" /><label for="image2"><img src="<?php echo $MidImgUrlDir; ?>" id="Image2Thumbnail" alt="Uhhh...Whoops"/></label>
			<h1>Option 3:</h1>
			<input type="radio" name="UploadImage" id="image3" value="<?php echo $EndImgUrlDir; ?>" /><label for="image3"><img src="<?php echo $EndImgUrlDir; ?>" id="Image3Thumbnail" alt="Uhhh...Whoops"/></label>
			<br />
			<input type="submit" />
			
		</form>

		



		
	</body>
</html>