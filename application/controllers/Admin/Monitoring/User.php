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
		$data['tab'] = "2";
		$data['tipe'] = "3";
		$data['title'] = "User Provinsi";
		$data['user'] = "1";

		$data['list_role'] = $this->All_m->list_user_role($ket = 1);
		$data['users'] = $this->User_m->list_user_prov();
		$data['role_user'] = array();
		foreach ($data['users'] as $key => $user) {
			$data['role_user'][$key] = $this->All_m->list_user_access($user['nip_lama']);
			// var_dump($data['role_user'][$key]);
			// echo '<hr>';
		}
		$this->load->vars($data);

		$this->load->view('template/header');
		// $this->load->view('template/topNav');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/monitoring/userControlView');
		$this->load->view('template/footer');
	}

	public function userKabkota()
	{
		$data['tab'] = "2";
		$data['tipe'] = "3";
		$data['title'] = "User Kabupaten/Kota";
		$data['user'] = "1";

		$data['list_role'] = $this->All_m->list_user_role($ket = 2);
		$data['users'] = $this->User_m->list_user_kabkota();


		foreach ($data['users'] as $key => $user) {
			$data['role_user'][$key] = $this->All_m->list_user_access($user['nip_lama_pegawai_kabkota']);
			// var_dump($data['role_user'][$key]);
			// echo '<hr>';
		}

		$this->load->vars($data);

		$this->load->view('template/header');
		// $this->load->view('template/topNav');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/monitoring/userKabKotaView');
		$this->load->view('template/footer');
	}


	public function editRole($ket)
	{

		$id = $this->input->post('idEdit');
		$nip = intval($this->input->post('nipEdit'));
		// var_dump($nip);
		// die;
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

		if ($selectedRole != null) {
			foreach ($selectedRole as $indeks => $value) {
				$hasil = $this->User_m->edit_role_user($nip, (int)$value);
			}
		} else {
			$hasil['point'] = 'sukses';
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
