<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public $load;
	public $User_m;
	public $session;
	public $input;
	public $pagination;
	public $uri;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		//session_name("ckp34");
		if (!(isset($_SESSION['nip']))) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
			redirect('sso/index', 'refresh');
		}

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['tabUser'] = "1";
		$data['tab'] = "2";
		$data['tipe'] = "1";
		$data['title'] = "User Provinsi";
		$data['user'] = "1";

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


		$data['users'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = false);
		$data['result_user'] = $config['total_rows'];

		// var_dump($data['users']);
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

		// var_dump($data['users']);
		$this->load->vars($data);


		$this->load->view('admin/monitoring/userKabkotaAjaxView');
	}

	public function editRole()
	{

		if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Edit User</div>');
			redirect('admin/monitoring/Kegiatan', 'refresh');
		}

		$id = $this->input->post('idEdit');
		$hasil = $this->User_m->edit_role_user($id);


		if ($hasil['point'] == 'sukses') {

			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Mengubah Role User</div> ');
			redirect('admin/monitoring/User', 'refresh');
		} else {

			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Gagal Mengubah Role User</h1></div> ');
			redirect('admin/monitoring/User', 'refresh');
		}
	}


}
