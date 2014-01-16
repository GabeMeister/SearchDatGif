<?php
require_once 'C:\xampp\htdocs\test\GifFrameExtractor\src\GifFrameExtractor\GifFrameExtractor.php';


// Download the gif that the user pasted in
if(isset($_POST['image_url']))
{
	$image_url = $_POST['image_url'];
}

$FileIn = file_get_contents($image_url);
$DownloadedFileDir = 'C:\xampp\htdocs\test\images\DownloadedImg.gif';

$SuccessOrNot = file_put_contents($DownloadedFileDir, $FileIn);

if(!$SuccessOrNot)
{
	die("Couldn't Download File Correctly.");
}

// Check if the image is an animated gif
if(!GifFrameExtractor::isAnimatedGif($DownloadedFileDir))
{
	die("This isn't an animated gif");
}

// create the new extracted image frames
$gfe = new GifFrameExtractor();
$gfe->extract($DownloadedFileDir);

$total_frames = $gfe->getFrameNumber();

// create output frames
$output = array();
for($i = 0; $i < $total_frames; $i++)
{
	$output[$i] = 'output' . ($i + 1) . '.jpg';
}


// save output frames to server.
$i = 0;
foreach($gfe->getFrames() as $frame)
{
	$OutputFile = 'C:\xampp\htdocs\test\images\\' . $output[$i++];

	$OutputSuccess = imagepng($frame['image'], $OutputFile);

	if(!$OutputSuccess)
	{
		die("Something went terribly wrong.");
	}
	
}

echo "You made it. Done-zo." . "<br />";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Testing</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">

	</head>
	<body>
		
		


	</body>
</html>
