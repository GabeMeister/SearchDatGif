<?php


require_once 'C:\xampp\htdocs\SearchDatGif\assets\chromephp\ChromePhp.php';

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
		
		// do the image processing here, then load the views for the user to use.
		
		
	}
}