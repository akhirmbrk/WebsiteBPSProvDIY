<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpd_admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		session_name("ckp34");
		if (!(isset($_SESSION['id_pegawai']))) {
            $this->session->set_flashdata('info_form',' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
            redirect('home/index','refresh');
        }
		if ($_SESSION['level_user_mpd']==0) {
            $this->session->set_flashdata('info_form',' <div class="alert alert-block alert-danger">444 tidak terautentifikasi</div>');
            redirect('mpd/mpd/no_admin','refresh');
        }
		
		$this->load->library('form_validation');
		$this->load->model('Mpd');
		$this->load->model('All_m');
		
		
		date_default_timezone_set("Asia/Bangkok");
		
		
		
	}
	


	public function index ($id_insert=0)	{
		$data = array();
	
		$data['mpdadmin'] = "1";
		$data['id_insert'] = $id_insert;
		$data['list_mpd'] = $this->Mpd->list_mpd();
		
		
		$this->load->vars($data);

		
		
		$this->load->view('mpd/part/header');
		$this->load->view('mpd/admin_beranda');
		$this->load->view('mpd/part/footer');		
	}
	
	

	
	
	public function add ()	{

        $this->load->library('form_validation');	
		$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');  
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
		
        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');
		$this->form_validation->set_message('numeric', '%s harus berisi angka');
		
        if ($this->form_validation->run() == FALSE) {
			
			$data = array();	
			$data['mpdadmin'] = "1";

			$this->load->vars($data);
			
			
			$this->load->view('mpd/part/header');
			$this->load->view('mpd/add_mpd');
			$this->load->view('mpd/part/footer');	
		    
        }else{
            $id_insert = $this->Mpd->add_mpd();
			
			$this->session->set_flashdata('id_insert', $id_insert);	
			$this->session->set_flashdata('info_form','<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Tambah Pencairan Dana</div>');	
			
			
			redirect('mpd/mpd_admin/index/'.$id_insert,'refresh');	

        }
	}
	
	
	public function upload_tahap ($tahap,$id_mpd)	{

		
			$data = array();	
			$data['mpdadmin'] = "1";
			
			$data['definisi_step'] = $this->Mpd->definisi_step($tahap);
			
			$data['data_mpd'] = $this->Mpd->data_mpd($id_mpd);
			$data['tahap'] = $tahap;
			$data['tanggal_now'] = $this->Mpd->format_date_now(); 

			$this->load->vars($data);			
			$this->load->view('mpd/part/header');
			$this->load->view('mpd/upload_tahap');
			$this->load->view('mpd/part/footer');	
		    

	}
	
	public function upload_proses ()	{
		$nama_file = $this->input->post("id_mpd")."_".$this->input->post("tahap")."_".now();
		
		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './mpd/';
		$config['allowed_types'] = 'zip|pdf';
		$config['max_size']	= '10048';
		$config['overwrite'] = true;
		$config['file_name'] = $nama_file;

		
		$oke = $this->upload->initialize($config); // Load konfigurasi uploadnya

		if($this->upload->do_upload('file')){ 
			//echo "ok";
			
			$dataup = array('upload_data' => $this->upload->data());			
			$this->Mpd->upload_proses($dataup['upload_data']['file_name'],$this->input->post("id_mpd"),$this->input->post("tahap"));
			
			$this->session->set_flashdata('info_form','<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Upload Dokumen</div> ');
			
			redirect('mpd/mpd_admin/index/'. $this->input->post("id_mpd"),'refresh');				
			
		}else{	
			//echo "osssk";		
			$this->session->set_flashdata('info_form','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Upload, Silahkan Ulangi</div> ');	 
			
			redirect('mpd/mpd_admin/upload_tahap/'. $this->input->post("tahap").'/'.$this->input->post("id_mpd"),'refresh');			
			
		}

		
		
			
		//redirect('mpd/mpd_admin/index/'. $this->input->post("id_mpd"),'refresh');	


	}
	
	
	
	public function edit_uraian ($id_mpd)	{
		 $this->load->library('form_validation');	
		$this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');  
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
		
        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');
		$this->form_validation->set_message('numeric', '%s harus berisi angka');
		
        if ($this->form_validation->run() == FALSE) {
			
			$data = array();	
			$data['mpdadmin'] = "1";
			$data['data_mpd'] = $this->Mpd->data_mpd($id_mpd);
		
			$this->load->vars($data);
			
			
			$this->load->view('mpd/part/header');
			$this->load->view('mpd/edit_mpd');
			$this->load->view('mpd/part/footer');	
		    
        }else{
            $id_insert = $this->Mpd->edit_mpd();
			
			$this->session->set_flashdata('id_insert', $id_insert);	
			$this->session->set_flashdata('info_form','<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Update Pencairan Dana</div>');	
			
			
			redirect('mpd/mpd_admin/index/'.$id_insert,'refresh');	

        }
	}
	
	
	public function edit_upload_tahap ($tahap,$id_mpd)	{

	
			
			$data = array();	
			$data['mpdadmin'] = "1";
			
			$data['definisi_step'] = $this->Mpd->definisi_step($tahap);
			
			$data['data_mpd'] = $this->Mpd->data_mpd($id_mpd);
			$data['tahap'] = $tahap;
			$data['tanggal_now'] = $this->Mpd->format_date_now(); 

			$this->load->vars($data);			
			$this->load->view('mpd/part/header');
			$this->load->view('mpd/edit_upload_tahap');
			$this->load->view('mpd/part/footer');	
		    
     
	}
	
	public function edit_upload_proses ()	{
		$nama_file = $this->input->post("id_mpd")."_".$this->input->post("tahap")."_".now();
		
		$this->load->library('upload'); // Load librari upload
		$config['upload_path'] = './mpd/';
		$config['allowed_types'] = 'zip|pdf';
		$config['max_size']	= '10048';
		$config['overwrite'] = true;
		$config['file_name'] = $nama_file;

		
		$oke = $this->upload->initialize($config); // Load konfigurasi uploadnya

		if($this->upload->do_upload('file')){ 
			//echo "ok";
			
			$dataup = array('upload_data' => $this->upload->data());			
			$this->Mpd->upload_proses($dataup['upload_data']['file_name'],$this->input->post("id_mpd"),$this->input->post("tahap"));
			
			$this->session->set_flashdata('info_form','<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Upload Dokumen</div> ');
			
			redirect('mpd/mpd_admin/edit_upload_tahap/'.$this->input->post("tahap").'/'. $this->input->post("id_mpd"),'refresh');				
			
		}else{	
			//echo "osssk";		
			$this->session->set_flashdata('info_form','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Upload, Silahkan Ulangi</div> ');	 
			
			redirect('mpd/mpd_admin/upload_tahap/'. $this->input->post("tahap").'/'.$this->input->post("id_mpd"),'refresh');			
			
		}

		
		
			
		//redirect('mpd/mpd_admin/index/'. $this->input->post("id_mpd"),'refresh');	


	}
	

}