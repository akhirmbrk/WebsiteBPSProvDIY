<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{


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
		$data['tipe'] = "landing";
		$data['tab'] = "1";
		$data['title'] = "Website Integrasi";

		$this->load->view('template/header', $data);
		$this->load->view('template/topnav', $data);
		$this->load->view('landingpage');
		$this->load->view('part/footer_zoomindex');
	}
}
