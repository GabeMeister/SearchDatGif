<?php

//require_once 'C:\xampp\htdocs\SearchDatGif\assets\chromephp\ChromePhp.php';


class Submit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("SubmitView");
	}

	public function thumbnail()
	{

		require_once(APPPATH . 'GifFrameExtractor/src/GifFrameExtractor/GifFrameExtractor.php');
		require_once(APPPATH . 'chromephp/ChromePhp.php');

		$image_url = $this->input->post("GifUrl");


		if($image_url === null || $image_url === false)
		{
			die("Sorry, I didn't recognize your gif. Please try again.<br />");
		}
		
		
		// We do the image processing here, then load the views for the user to use.
		$FileIn = file_get_contents($image_url);



		$DownloadedFileDir = GetImageDir('DownloadedImg.gif');
		$SuccessOrNot = file_put_contents($DownloadedFileDir, $FileIn);


		if(!$SuccessOrNot)
		{
			die("Couldn't Download File Correctly.");
		}


		// Check if the image is an animated gif
		if(!GifFrameExtractor::isAnimatedGif($DownloadedFileDir))
		{
			die("This isn't an animated gif! Please try again.");
		}


		// Make the three thumbnails
		// create the new extracted image frames
		$gfe = new GifFrameExtractor();
		$gfe->extract($DownloadedFileDir);

		$total_frames = $gfe->getFrameNumber();

		// create output frames

		$begin = 0;
		$midpoint = intval(floor($total_frames / 2));
		$end = $total_frames - 2;



		// save output frames to server.
		$i = 0;
		foreach($gfe->getFrames() as $frame)
		{

			if($i === $begin || $i === $midpoint || $i === $end)
			{
				switch($i)
				{
					case $begin:
						$BeginImgLocalDir = GetImageDir('begin.jpg');
						$BeginImgUrlDir = asset_url('assets/images/begin.jpg');
						$OutputSuccess = imagejpeg($frame['image'], $BeginImgLocalDir);
						break;
					case $midpoint:
						$MidImgLocalDir = GetImageDir('mid.jpg');
						$MidImgUrlDir = asset_url('assets/images/mid.jpg');
						$OutputSuccess = imagejpeg($frame['image'], $MidImgLocalDir);
						break;
					case $end:
						$EndImgLocalDir = GetImageDir('end.jpg');
						$EndImgUrlDir = asset_url('assets/images/end.jpg');
						$OutputSuccess = imagejpeg($frame['image'], $EndImgLocalDir);
						break;
				}


				if(!$OutputSuccess)
				{
					die("Something went terribly wrong.");
				}
			}

			$i++;
		}

		// We make data array to send to ThumbNails view
		$data['BeginImgUrlDir'] = $BeginImgUrlDir;
		$data['MidImgUrlDir'] = $MidImgUrlDir;
		$data['EndImgUrlDir'] = $EndImgUrlDir;



		// We now load the ThumbNail View.
		$this->load->view("ThumbNails", $data);
	}

	public function Success()
	{
		// upload the image
		$UploadImgDir = $this->input->post("UploadImage");
		
		
		// We upload the picture
		$ImgLnk = ImgurUploadLink(file_get_contents($UploadImgDir));
		
		
		echo $ImgLnk;
		
		// delete all the downloaded images
		unlink(GetImageDir('DownloadedImg.gif'));
		unlink(GetImageDir('begin.jpg'));
		unlink(GetImageDir('mid.jpg'));
		unlink(GetImageDir('end.jpg'));
		
		
	}

	

}
