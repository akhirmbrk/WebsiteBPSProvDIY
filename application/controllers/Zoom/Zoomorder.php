<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zoomorder extends CI_Controller
{
	public $load;
	public $session;
	public $All_m;
	public $upload;
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
		$defadata['defadata'] = $this->All_m->top_bar();
		$this->load->vars($defadata);
		date_default_timezone_set("Asia/Jakarta");
	}



	public function index($bulan = 0, $tahun = 0)
	{
		//echo "oke".$_SESSION['nip'];	
		$data = array();

		$data['title'] = "Dashboard";
		$data['dash'] = "1";
		$data['tab'] = "1";
		$data['tipe'] = '2';
		$data['content'] = 'Dashboard Informasi Jadwal Rapat';

		$this->load->vars($data);

		$this->load->view('template/header');
		$this->load->view('template/topnav', $data);
		$this->load->view('template/header_content', $data);
		$this->load->view('zoom/zoomindex');
		$this->load->view('part/footer_zoomindex');
	}

	public function evenn()
	{


		$dataeven = $this->All_m->even();

		/* if (count($dataeven)) {
			foreach ($dataeven as $indeks => $list) {
				
				
			}
		}
		
		[{"title":"zoom pertam oiy1","start":"02-02-2023T11:00:00"},{"title":"rapat st2023","start":"02-16-2023T05:00:00"}]
  
		$arr[0] = array('title' => "All Day Event", 'start' => "2023-01-22", 'className' =>  "badge badge-success");    
		$arr[1] = array('title' => "All Day Event", 'start' => "2023-01-25", 'className' =>  "badge badge-warning");
		$arr[2] = array('title' => "All errr Event", 'start' => "2023-02-12T10:30:00-05:00", "end"=> "2023-02-12T12:30:00-05:00", 'className' =>  "badge badge-warning", "url"=>base_url('index.php/zoomorder/indddex')); */


		$ff = json_encode($dataeven);

		header('Content-Type: application/json');
		echo $ff;
	}




	public function order()
	{
		$data = array();

		$data['tipe'] = '2';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('perihal', 'Perihal Zoom', 'trim|required');
		$this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('time_start', 'Jam Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('time_end', 'Jam Selesai', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		$this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Create Meeting";
			$data['ordered'] = "1";
			$data['content'] = 'Permintaan Rapat';

			$data['ruangan'] = $this->All_m->list_ruangan();


			$tgl = date('Y-m-d', strtotime(' +0 day'));

			$tgl_dh_1 = substr($tgl, 8, 2);
			$bln_dh_1 = substr($tgl, 5, 2);
			$thn_dh_1 = substr($tgl, 0, 4);
			$data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

			$this->load->vars($data);
			$this->load->view('template/header', $data);
			$this->load->view('template/topnav', $data);
			$this->load->view('template/header_content', $data);
			$this->load->view('zoom/order');
			$this->load->view('part/footer');
		} else {
			$hasil = $this->All_m->addorder();


			if ($hasil['point'] == 'sukses') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Pesan Zoom</div> ');
				redirect('zoom/Zoomorder/order/', 'refresh');
			} else if ($hasil['point'] == 'lewat') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tanggal'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
				redirect('zoom/Zoomorder/order/', 'refresh');
			} else if ($hasil['point'] == 'block') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Zoom untuk Tanggal ' . $hasil['tanggal'] . ' Sudah Penuh</h1></div> ');
				redirect('zoom/Zoomorder/order/', 'refresh');
			}
		}
	}


	public function myorder()
	{

		$data = array();
		$data['title'] = "My Meeting";
		$data['myorder'] = "1";
		$data['tipe'] = '2';
		$data['content'] = 'Daftar Permintaan Rapat Saya';

		$data['list_order'] = $this->All_m->list_order($_SESSION['nip']);

		$this->load->vars($data);

		$this->load->view('template/header', $data);
		$this->load->view('template/topnav', $data);
		$this->load->view('template/header_content', $data);
		$this->load->view('zoom/myorder');
		$this->load->view('part/footer');
	}


	public function editzoom($idm)
	{

		$data = array();
		$this->load->library('form_validation');

		$this->form_validation->set_rules('perihal', 'Perihal Zoom', 'trim|required');
		$this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('time_start', 'Jam Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('time_end', 'Jam Selesai', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		$this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');


		if ($this->form_validation->run() == FALSE) {

			$data['title'] = "My Meeting";
			$data['tipe'] = "2";
			$data['myorder'] = "1";
			$data['content'] = 'Permintaan Rapat';

			$data['idm'] = $idm;
			$data['editzoom'] = $this->All_m->editzoom($idm);

			$data['ruangan'] = $this->All_m->list_ruangan();


			$this->load->vars($data);
			$this->load->view('template/header', $data);
			$this->load->view('template/topnav', $data);
			$this->load->view('template/header_content', $data);
			$this->load->view('zoom/editzoom', $data);
			$this->load->view('part/footer');
		} else {


			$hasil = $this->All_m->editzoomcek($idm);


			if ($hasil['point'] == 'sukses') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Pesan Zoom</div> ');
				redirect('zoom/Zoomorder/myorder/', 'refresh');
			} else if ($hasil['point'] == 'lewat') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tanggal'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
				redirect('zoom/Zoomorder/editzoom/' . $idm, 'refresh');
			} else if ($hasil['point'] == 'block') {

				$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Zoom untuk Tanggal ' . $hasil['tanggal'] . ' Sudah Penuh</h1></div> ');
				redirect('zoom/Zoomorder/editzoom/' . $idm, 'refresh');
			}
		}
	}



	public function lookzoom($idm)
	{
		$data = array();


		$data['tipe'] = "2";
		$data['title'] = "My Meeting";
		$data['myorder'] = "1";
		$data['content'] = 'Deskripsi Rapat';

		$data['idm'] = $idm;
		$data['lookzoom'] = $this->All_m->lookzoom($idm);

		$this->load->vars($data);
		$this->load->view('template/header', $data);
		$this->load->view('template/topnav', $data);
		$this->load->view('template/header_content', $data);
		$this->load->view('zoom/lookzoom');
		$this->load->view('part/footer');
	}


	public function myorderupload()
	{

		$data = array();
		$data['title'] = "Memo Rapat";
		$data['tipe'] = "2";
		$data['myorderupload'] = "1";
		$data['content'] = 'Notulen Rapat Saya';

		$data['list_order'] = $this->All_m->list_order_upload($_SESSION['nip']);

		$this->load->vars($data);

		$this->load->view('template/header', $data);
		$this->load->view('template/topnav', $data);
		$this->load->view('template/header_content', $data);
		$this->load->view('zoom/myorderupload');
		$this->load->view('part/footer');
	}



	public function uploadnotulenview($idm)
	{
		$data = array();


		$data['title'] = "Upload Notulen";
		$data['tipe'] = "2";
		$data['myorderupload'] = "1";
		$data['content'] = 'Upload Notulen Rapat Saya';

		$data['idm'] = $idm;
		$this->load->vars($data);
		$this->load->view('template/header', $data);
		$this->load->view('template/topnav', $data);
		$this->load->view('template/header_content', $data);
		$this->load->view('zoom/uploadnotulenview');
		$this->load->view('part/footer');
	}


	public function uploadnotulen($idm)
	{

		$nama_file = $idm . "_" . now();

		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './notulen/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $nama_file;


		$this->upload->initialize($config); // Load konfigurasi uploadnya

		if ($this->upload->do_upload('file')) {
			$this->All_m->upload_notulen($nama_file, $idm);

			$this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Upload</div> ');
		} else {
			$this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Upload, Silahkan Ulangi</div> ');
		}

		//$lppsw = '<div class="alert alert-success fade in"> <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> <strong>Berhasil </strong> Upload Data DSRT</div>';
		//$this->session->set_flashdata('info_form',$lppsw);
		redirect('zoom/zoomorder/myorderupload/', 'refresh');
	}
}
