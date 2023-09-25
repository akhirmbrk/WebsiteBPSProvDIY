<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public $load;
	public $User_m;
	public $All_m;
	public $session;
	public $input;
	public $pagination;
	public $uri;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->model('All_m');
		//session_name("ckp34");
		if (!(isset($_SESSION['nip']))) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
			redirect('sso/index', 'refresh');
		}

		// CEK ROLE USER
		$role = [1, 2];
		$akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
		if ($akses < 1) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
			redirect('Landingpage', 'refresh');
		}
		//-------------------

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{

		$data['tabUser'] = "1";
		$data['tab'] = "2";
		$data['tipe'] = "1";
		$data['title'] = "User Provinsi";
		$data['user'] = "1";

		$data['list_role'] = $this->All_m->list_user_role($ket = 1);
		$this->load->vars($data);

		$this->load->view('template/header');
		// $this->load->view('template/topNav');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/monitoring/userControlView');
		$this->load->view('template/footer');
	}

	public function indexAjax()
	{
		$search = array(
			'keyword' => trim($this->input->post('searchUser')),
		);

		$this->load->library('pagination');

		$config['base_url'] = "http://localhost/WebsiteBPSProvDIY/Admin/Monitoring/User/indexAjax";
		$data['start'] = $this->uri->segment(5);
		$config['per_page'] = 5;
		$config['total_rows'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = true);

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);


		// $data['users'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = false);
		// foreach ($data['users'] as $key => $user) {
		// 	// var_dump($user['nip_lama']);
		// 	$data['role_user'][$key] = $this->All_m->list_user_access($user['nip_lama']);
		// }
		$data['users'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = false);
		$data['result_user'] = $config['total_rows'];
		$data['role_user'] = array();
		foreach ($data['users'] as $key => $user) {
			$data['role_user'][$key] = $this->All_m->list_user_access($user['nip_lama']);
			// var_dump($data['role_user'][$key]);
			// echo '<hr>';
		}
		// die;


		$this->load->vars($data);


		$this->load->view('admin/monitoring/userAjaxView');
	}

	public function userKabkota()
	{
		$data['tabUserKabkota'] = "1";
		$data['tab'] = "2";
		$data['tipe'] = "1";
		$data['title'] = "User Kabupaten/Kota";
		$data['user'] = "1";

		$data['list_role'] = $this->All_m->list_user_role($ket = 2);

		$this->load->vars($data);

		$this->load->view('template/header');
		// $this->load->view('template/topNav');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/monitoring/userKabKotaView');
		$this->load->view('template/footer');
	}

	public function userKabkotaAjax()
	{
		$search = array(
			'keyword' => trim($this->input->post('searchUser')),
		);

		$this->load->library('pagination');

		$config['base_url'] = "http://localhost/WebsiteBPSProvDIY/Admin/Monitoring/User/userKabkotaAjax";
		$data['start'] = $this->uri->segment(5);
		$config['per_page'] = 5;
		$config['total_rows'] = $this->User_m->get_users_kabkota_live($config['per_page'], $data['start'], $search, $count = true);

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);


		$data['users'] = $this->User_m->get_users_kabkota_live($config['per_page'], $data['start'], $search, $count = false);
		$data['result_user'] = $config['total_rows'];

		foreach ($data['users'] as $key => $user) {
			$data['role_user'][$key] = $this->All_m->list_user_access($user['nip_lama_pegawai_kabkota']);
			// var_dump($data['role_user'][$key]);
			// echo '<hr>';
		}

		// var_dump($data['users']);
		$this->load->vars($data);


		$this->load->view('admin/monitoring/userKabkotaAjaxView');
	}

	public function editRole($ket)
	{

		$id = $this->input->post('idEdit');
		$nip = (int) $this->input->post('nipEdit');

		if ($nip == null) {
			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Pilih User yang akan di edit terlebih dahulu</div> ');
			if ($ket == '1') {
				redirect('admin/monitoring/User', 'refresh');
			} else {
				redirect('admin/monitoring/User/userKabkota', 'refresh');
			}
		}
		// var_dump((int)$nip);
		// die;
		$selectedRole = $this->input->post('roleEdit');

		$this->User_m->hapus_role($nip);

		foreach ($selectedRole as $indeks => $value) {
			$hasil = $this->User_m->edit_role_user($nip, (int)$value);
		}


		if ($hasil['point'] == 'sukses') {

			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Mengubah Role User</div> ');
			if ($ket == 1) {
				redirect('admin/monitoring/User', 'refresh');
			} else {
				redirect('admin/monitoring/User/userKabkota', 'refresh');
			}
		} else {

			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Mengubah Role User</div> ');

			if ($ket == 1) {
				redirect('admin/monitoring/User', 'refresh');
			} else {
				redirect('admin/monitoring/User/userKabkota', 'refresh');
			}
		}
	}
}
