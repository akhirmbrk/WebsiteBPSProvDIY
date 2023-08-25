<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpd extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		session_name("ckp34");
		if (!(isset($_SESSION['id_pegawai']))) {
            $this->session->set_flashdata('info_form',' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
            redirect('home/index','refresh');
        }
		$this->load->library('form_validation');
		$this->load->model('Ckp_m');
		$this->load->model('All_m');
		$defadata['defadata'] = $this->All_m->top_bar();
		$this->load->vars($defadata);
		date_default_timezone_set("Asia/Bangkok");
	}
	


	public function index ()	{
		$data = array();
		
		$data['mpdberanda'] = "1";
		
		$this->load->vars($data);
		$this->load->view('mpd/part/header');
		$this->load->view('mpd/mpd');
		$this->load->view('mpd/part/footer');		

	}
	
	
	public function lookup ()	{
		$data = array();
	
		$data['mpdlihat'] = "1";
		$this->load->vars($data);
		$this->load->view('mpd/part/header');
		$this->load->view('mpd/lookup');
		$this->load->view('mpd/part/footer');	

	}
	
	
	public function no_admin ($bulan=0,$tahun=0)	{
		$data = array();
	
		
		$this->load->vars($data);
		$this->load->view('mpd/lookup');
	}
	
	
	
}