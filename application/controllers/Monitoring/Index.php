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
	public $Z_anggotateam_m;
	public $form_validation;
	public $input;
	public $pagination;
	public $uri;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('monitoring/Kegiatan_m');
		$this->load->model('monitoring/BPS_m');
		$this->load->model('monitoring/Periode_m');
		$this->load->model('monitoring/tim_kerja_m');
		$this->load->model('monitoring/Z_anggotateam_m');
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
		$this->load->library('pagination');

		$config['base_url'] = "http://localhost/WebsiteBPSProvDIY/monitoring/index/userControl";
		$config['total_rows'] = $this->User_m->get_jumlah_user();
		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav class="mt-3"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item ">';
		$config['first_tag_close'] = '</li>';

		$config['next_link'] = '<span class="ti-arrow-right"></span>';
		$config['next_tag_open'] = '<li class="page-item ">';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$config['prev_link'] = '<span class="ti-arrow-left"></span>';
		$config['prev_tag_open'] = '<li class="page-item ">';
		$config['prev_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item ">';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);


		$data['tab'] = "2";
		$data['tipe'] = "1";
		$data['title'] = "User Utama";
		$data['start'] = $this->uri->segment(4);

		$data['users'] = $this->User_m->get_users($config['per_page'], $data['start']);
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
	public function addTimUser()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kodeBPS', 'Kode BPS', 'trim|required');
		$this->form_validation->set_rules('timKerja', 'Tim Kerja', 'trim|required');
		$this->form_validation->set_rules('periode', 'Periode', 'trim|required');
		$this->form_validation->set_rules('anggota', 'Anggota', 'trim|required');

		$this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');


		$member = $this->input->post('sample-typeahead');
		$arr_member = explode(",", $member);
		// var_dump($arr_member);

		foreach ($arr_member as $item) {
			$coba[] = $this->User_m->detail_user_by_name($item);
		}
		// var_dump($coba);

		foreach ($coba as $indeks => $item) {
			if ($indeks == 0) {
				$ketua = 1;
			} else {
				$ketua = 0;
			}
			// var_dump($item['ida']);
			$hasil = $this->Z_anggotateam_m->add_teams($item['ida'], $ketua);
		}

		if ($hasil['point'] == 'sukses') {
			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Buat Kegiatan</div> ');
			redirect('monitoring/index/timKerja', 'refresh');
		} else if ($hasil['point'] == 'lewat') {

			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tgl_start'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
			redirect('monitoring/index/timKerja', 'refresh');
		} else if ($hasil['point'] == 'block') {

			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Kegiatan untuk Tanggal ' . $hasil['tgl_start'] . ' Sudah Penuh</h1></div> ');
			redirect('monitoring/index/timKerja', 'refresh');
		}
	}

	public function timKerja()
	{
		$this->load->library('pagination');

		$config['base_url'] = "http://localhost/WebsiteBPSProvDIY/monitoring/index/timKerja";
		$config['total_rows'] = $this->Z_anggotateam_m->get_jumlah_team();
		$config['per_page'] = 5;

		$config['full_tag_open'] = '<nav class="mt-3"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item ">';
		$config['first_tag_close'] = '</li>';

		$config['next_link'] = '<span class="ti-arrow-right"></span>';
		$config['next_tag_open'] = '<li class="page-item ">';
		$config['next_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$config['prev_link'] = '<span class="ti-arrow-left"></span>';
		$config['prev_tag_open'] = '<li class="page-item ">';
		$config['prev_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item ">';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja";

		$data['start'] = $this->uri->segment(4);

		$filter['bps'] = $this->BPS_m->list_bps();
		$filter['periode'] = $this->Periode_m->list_periode();
		$filter['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();

		$data['teams'] = $this->Z_anggotateam_m->get_teams($config['per_page'], $data['start']);;

		$this->load->vars($data);
		$this->load->vars($filter);

		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/timKerjaView');
		$this->load->view('template/footer');
	}

	public function detailTimKerja($id, $bps, $periode)
	{
		$data['tab'] = "4";
		$data['tipe'] = "1";
		$data['title'] = "Tim Kerja Monitoring BPS";


		$data['member'] = $this->Z_anggotateam_m->list_anggota_team($id, $bps, $periode);

		$this->load->vars($data);
		$this->load->view('template/header');
		$this->load->view('template/topNav');
		$this->load->view('monitoring/detailTimKerjaView');
		$this->load->view('template/footer');
	}
}
