<?php

function asset_url($path)
{
	return base_url() . $path;
}

// CONSTANTS THAT MUST BE CHANGED FOR EVERY SERVER
function GetDownloadedFileDir()
{
	return 'C:\xampp\htdocs\SearchDatGif\assets\images\DownloadedImg.gif';
}

function GetImageDir($ImageName)
{
	return 'C:\xampp\htdocs\SearchDatGif\assets\images\\' . $ImageName;
}

function ImgurUploadLink($image)
{
	$id = 'b7bcac1670028f2';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $id));
	curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image)));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	$response = json_decode($response);
	curl_close($ch);


	return $response->data->link;
}
