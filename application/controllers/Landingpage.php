<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{
	public $load;
	public $All_m;
	public $session;

	public function __construct()
	{
		parent::__construct();
		//session_name("ckp34");
		if (!(isset($_SESSION['nip']))) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
			redirect('sso/index', 'refresh');
		}
		$this->load->library('form_validation');
		$this->load->model('All_m');
		$defadata['defadata'] = $this->All_m->top_bar();

		$this->load->vars($defadata);
		date_default_timezone_set("Asia/Jakarta");
	}



	public function index()
	{
		$data['tipe'] = "Landing";
		$data['tab'] = "1";
		$data['title'] = "Website Integrasi";

		$this->load->vars($data);

		$this->load->view('template/header_landing');
		$this->load->view('template/topnav');
		$this->load->view('landingBaru');
		$this->load->view('template/footer_landing');
		// $this->load->view('landingpage');
	}
}
