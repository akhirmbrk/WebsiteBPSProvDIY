<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monitoring/Kegiatan_m');
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
    }

    public function tambahKegiatan()
    {
        $data = array();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
        $this->form_validation->set_rules('id_tim_kerja', 'Kode Tim Kerja', 'trim|required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = "Create Kegiatan";


            $tgl = date('Y-m-d', strtotime(' +0 day'));

            $tgl_dh_1 = substr($tgl, 8, 2);
            $bln_dh_1 = substr($tgl, 5, 2);
            $thn_dh_1 = substr($tgl, 0, 4);
            $data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

            $this->load->vars($data);
            $this->load->view('template/header', $data);
            $this->load->view('template/topnav', $data);
            $this->load->view('monitoring/tambahKegiatan');
            $this->load->view('template/footer');
        } else {
            $hasil = $this->Kegiatan_m->add_kegiatan();

            if ($hasil['point'] == 'sukses') {
                $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Buat Kegiatan</div> ');
                redirect('monitoring/index/kegiatan', 'refresh');
            } else if ($hasil['point'] == 'lewat') {

                $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tgl_start'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
                redirect('monitoring/index/kegiatan', 'refresh');
            } else if ($hasil['point'] == 'block') {

                $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Kegiatan untuk Tanggal ' . $hasil['tgl_start'] . ' Sudah Penuh</h1></div> ');
                redirect('monitoring/index/kegiatan', 'refresh');
            }
        }
    }


}
