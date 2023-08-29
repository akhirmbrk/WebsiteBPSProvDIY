<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemenfile extends CI_Controller
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
		date_default_timezone_set("Asia/Bangkok");
	}




	public function index($id_zperiode = 0)
	{
		$data = array();

		$data['judul'] = "";
		$data['dash'] = "1";

		// untuk menambahkan tambilan dalam satu halaman tidak perlu membuat methode baru ()
		$data['daftartahun'] = $this->All_m->list_tahun($id_zperiode);
		$data['daftarteam'] = $this->All_m->list_teamkerja($_SESSION['nip'], $id_zperiode);
		$this->load->vars($data);

		$this->load->view('part/header');
		// $this->load->view('part/topbar');
		$this->load->view('manajemenFile/file_home');
		$this->load->view('part/footer_zoomindex');
	}




	public function myrapatupload($id_zteam = 0)
	{
		$data = array();
		$data['judul'] = "";
		$data['myrapatupload'] = "1";


		// $data['id_zteam'] = $id_zteam;
		$data['listrapat'] = $this->All_m->list_rapat_upload($_SESSION['nip'], $id_zteam);

		$this->load->vars($data);
		$this->load->view('part/header');
		$this->load->view('part/topbar');
		$this->load->view('manajemenfile/myrapatupload');
		$this->load->view('part/footer');
	}

	public function uploadnotulenrapat($idr)
	{
		$data = array();


		$data['judul'] = "-";
		$data['myrapatupload'] = "1";

		$data['idr'] = $idr;
		$this->load->vars($data);
		$this->load->view('part/header');
		$this->load->view('uploadnotulenrapat');
		$this->load->view('part/footer');
	}

	public function notulenrapat($idr)
	{

		$nama_file = $idr . "_" . now();

		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './notulen/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $nama_file;


		$this->upload->initialize($config); // Load konfigurasi uploadnya

		if ($this->upload->do_upload('file')) {
			$this->All_m->upload_notulen_rapat($nama_file, $idr);

			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Upload</div> ');
		} else {
			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Upload, Silahkan Ulangi</div> ');
		}

		//$lppsw = '<div class="alert alert-success fade in"> <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> <strong>Berhasil </strong> Upload Data DSRT</div>';
		//$this->session->set_flashdata('info_form',$lppsw);
		redirect('manajemenfile/myrapatupload/', 'refresh');
	}
}