<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminbidang extends CI_Controller
{
	public $load;
	public $session;
	public $All_m;
	public $form_validation;

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
		// if ($defadata['admin_zoom'] != 1) {
		// 	redirect('zoom/zoomorder/index/', 'refresh');
		// }

		// CEK ROLE USER
		$role = [1, 3];
		// $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);

		// if ($akses < 1) {
		if (count(array_intersect($role, $_SESSION['user_role'])) < 1) {
			$this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
			redirect('Landingpage', 'refresh');
		}
		//-------------------
		// var_dump($_SESSION['user_role']);
		// die;



		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data = array();
		$data['title'] = "Permintaan Zoom";
		$data['tipe'] = 3;
		$data['admin_permintaan'] = "1";

		$data['list_order'] = $this->All_m->list_order_permintaan(0, 0);

		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/zoom/adminzoom');
		$this->load->view('template/footer');
	}

	public function daring_disetujui()
	{
		$data = array();
		$data['title'] = "Zoom Disetujui";
		$data['tipe'] = 3;
		$data['admindisetujui'] = "1";

		$data['list_order'] = $this->All_m->list_order_permintaan(1, 0);

		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/zoom/adminzoom_disetujui');
		$this->load->view('template/footer_zoomindex');
	}


	public function lookzoom($idm)
	{
		$data = array();

		$data['title'] = "Detail Zoom";
		$data['tipe'] = 3;
		$data['admindisetujui'] = "1";
		$data['myorder'] = "1";

		$data['idm'] = $idm;
		$data['lookzoom'] = $this->All_m->lookzoom($idm);

		$this->load->vars($data);
		$this->load->view('template/header');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('zoom/lookzoom');
		$this->load->view('template/footer');
	}


	public function daring_batal()
	{
		$data = array();
		$data['title'] = "Zoom Batal";
		$data['tipe'] = 3;
		$data['admin_batal'] = "1";

		$data['list_order'] = $this->All_m->list_order_permintaan(2, 0);

		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/sidetopbaradmin');
		$this->load->view('admin/zoom/adminzoom_batal');
		$this->load->view('template/footer_zoomindex');
	}



	public function replyzoom($idm)
	{
		$data = array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('reply', 'Jawaban Rapat Daring', 'trim|required');
		$this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Reply Zoom";
			$data['tipe'] = 3;
			$data['admin_permintaan'] = "1";

			$data['idm'] = $idm;
			$data['permintaan'] = $this->All_m->permintaan_data($idm);

			$this->load->vars($data);
			$this->load->view('template/header');
			$this->load->view('template/sidetopbaradmin');
			$this->load->view('admin/zoom/adminzoom_reply');
			$this->load->view('template/footer');
		} else {
			$this->All_m->update_permintaan($idm);
			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Setujui Permintaan Rapat Daring</div> ');
			redirect('admin/zoom/adminbidang/daring_disetujui/', 'refresh');
		}
	}



	public function hapuszoom($idm)
	{
		$this->All_m->hapuszoom($idm);
		$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Membatalakan Permintaan Rapat Daring</div> ');
		redirect('admin/zoom/adminbidang/daring_batal/', 'refresh');
	}



	public function order()
	{
		$data = array();
		$data['admin_tambahjadwal'] = "1";
		$data['tipe'] = 3;
		$this->load->library('form_validation');

		$this->form_validation->set_rules('perihal', 'Perihal Zoom', 'trim|required');
		$this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('time_start', 'Jam Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('time_end', 'Jam Selesai', 'trim|required');
		$this->form_validation->set_rules('reply', 'Link Rapat Daring', 'trim|required');

		$this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Tambah Jadwal Zoom";
			$data['content'] = 'Tambah Jadwal Zoom';
			$data['ordered'] = "1";
			$data['tipe'] = 3;


			$tgl = date('Y-m-d', strtotime(' +1 day'));

			$tgl_dh_1 = substr($tgl, 8, 2);
			$bln_dh_1 = substr($tgl, 5, 2);
			$thn_dh_1 = substr($tgl, 0, 4);
			$data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

			$this->load->vars($data);
			$this->load->view('template/header');
			$this->load->view('template/sidetopbaradmin');
			$this->load->view('admin/zoom/adminzoom_order');
			$this->load->view('template/footer');
		} else {
			$hasil = $this->All_m->addorderadmin();


			if ($hasil['point'] == 'sukses') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Pesan Zoom</div> ');
				redirect('admin/zoom/adminbidang/daring_disetujui/', 'refresh');
			} else if ($hasil['point'] == 'lewat') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tanggal'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
				redirect('admin/zoom/adminbidang/order/', 'refresh');
			} else if ($hasil['point'] == 'block') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Zoom untuk Tanggal ' . $hasil['tanggal'] . ' Sudah Penuh</h1></div> ');
				redirect('admin/zoom/adminbidang/order/', 'refresh');
			}
		}
	}
}
