<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('monitoring/Kegiatan_m');
		$this->load->model('monitoring/BPS_m');
		$this->load->model('monitoring/Periode_m');

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

		$data['list_kegiatan'] = $this->Kegiatan_m->list_kegiatan();

		$filter['bps'] = $this->BPS_m->list_bps();
		$filter['periode'] = $this->Periode_m->list_periode();


		$this->load->vars($data);
		$this->load->vars($filter);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/kegiatanView');
		$this->load->view('template/footer');
	}

	public function detailKegiatan($id)
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['progress'] = 70;
		$data['title'] = "Kegiatan Monitoring BPS";


		$data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);
		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/detailKegiatanView');
		$this->load->view('template/footer');
	}

	public function editKegiatan($id)
	{
		$data['tab'] = "3";
		$data['tipe'] = "1";
		$data['progress'] = 70;
		$data['title'] = "Kegiatan Monitoring BPS";


		$data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);
		$this->load->vars($data);

		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/editKegiatanView', $data);
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


	public function tambahTimKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tambah Tim Kerja BPS";

		$data['bps'] = $this->BPS_m->list_bps();

		$this->load->vars($data);

		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/tambahTimKerjaView', $data['bps']);
		$this->load->view('template/footer');
	}


	public function timKerja()
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja";

		$filter['bps'] = $this->BPS_m->list_bps();
		$filter['tim_kerja'] = $this->Periode_m->list_periode();
		$filter['periode'] = $this->Periode_m->list_periode();

		$this->load->vars($data);

		$this->load->view('template/header', $data);
		$this->load->view('template/topNav', $data);
		$this->load->view('monitoring/timKerjaView', $filter);
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
