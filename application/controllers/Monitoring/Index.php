<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
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
		$defadata = $this->All_m->top_bar();
		if ($defadata['admin_zoom'] != 1) {
			redirect('zoom/zoomorder/index/', 'refresh');
		}

		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$data['judul'] = "Login";
		$data['title'] = "Halaman Login";
		$this->load->view('template/header', $data);
		$this->load->view('monitoring/loginView', $data);
	}

	public function dashboard()
	{
		$data['tab'] = "1";
		$data['tipe'] = "1";
		$data['title'] = "Dashboard Utama";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/indexView');
		$this->load->view('template/footer');
	}

	public function userControl()
	{
		$data['tab'] = "2";
		$data['tipe'] = "1";
		$data['title'] = "User Utama";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/userControlView');
		$this->load->view('template/footer');
	}

	public function kegiatan()
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['progress'] = 76;
		$data['title'] = "Kegiatan";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/kegiatanView');
		$this->load->view('template/footer');
	}

	public function detailKegiatan()
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['progress'] = 70;
		$data['title'] = "Kegiatan Monitoring BPS";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/detailKegiatanView', $data);
		$this->load->view('template/footer');
	}

	public function tambahKegiatan()
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['title'] = "Tambah Kegiatan BPS";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/tambahKegiatan');
		$this->load->view('template/footer');
	}

	public function editKegiatan()
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['title'] = "Edit Kegiatan";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/editKegiatanView');
		$this->load->view('template/footer');
	}

	public function tambahTimKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tambah Tim Kerja BPS";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/tambahTimKerjaView');
		$this->load->view('template/footer');
	}


	public function timKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/timKerjaView');
		$this->load->view('template/footer');
	}

	public function detailTimKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja Monitoring BPS";
		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/detailTimKerjaView');
		$this->load->view('template/footer');
	}
}
