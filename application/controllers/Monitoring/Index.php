<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	public $BPS_m;
	public $load;
	public $session;
	public $User_m;
	public $All_m;
	public $Kegiatan_m;
	public $tim_kerja_m;
	public $Periode_m;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('monitoring/Kegiatan_m');
		$this->load->model('monitoring/BPS_m');
		$this->load->model('monitoring/Periode_m');
		$this->load->model('monitoring/tim_kerja_m');
		$this->load->model('User_m');
		$this->load->model('All_m');

		//session_name("ckp34");
		if (!(isset($_SESSION['nip']))) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
			redirect('sso/index', 'refresh');
		}
		$this->load->library('form_validation');
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

		$data['users'] = $this->User_m->list_user();
		// var_dump($data['users']);
		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/userControlView');
		$this->load->view('template/footer');
	}

	public function tambahTimKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tambah Tim Kerja BPS";

		$filter['bps'] = $this->BPS_m->list_bps();
		$filter['periode'] = $this->Periode_m->list_periode();
		$filter['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();

		$this->load->vars($data);
		$this->load->vars($filter);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/tambahTimKerjaView');
		$this->load->view('template/footer');
	}


	public function timKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja";

		$filter['bps'] = $this->BPS_m->list_bps();
		$filter['periode'] = $this->Periode_m->list_periode();
		$filter['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();

		$this->load->vars($data);
		$this->load->vars($filter);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
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
