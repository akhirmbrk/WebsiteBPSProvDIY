<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
	}
	
	
	
	public function index ()	{

		$this->load->view('part/header');
		$this->load->view('landingpage');		
		
	}
	


}
