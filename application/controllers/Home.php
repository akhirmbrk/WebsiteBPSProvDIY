<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public $load;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}



	public function index()
	{
		$data['title'] = 'Login';
		$data['tipe'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('login_lama');
	}
}
