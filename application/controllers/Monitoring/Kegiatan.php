<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public $load;
    public $session;
    public $form_validation;
    public $All_m;
    public $Kegiatan_m;
    public $BPS_m;
    public $tim_kerja_m;
    public $Periode_m;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('All_m');
        $this->load->model('monitoring/Kegiatan_m');
        $this->load->model('monitoring/tim_kerja_m');
        $this->load->model('monitoring/BPS_m');
        $this->load->model('monitoring/Periode_m');

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
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 76;
        $data['title'] = "Kegiatan";

        $data['list_kegiatan'] = $this->Kegiatan_m->list_kegiatan();

        foreach ($data['list_kegiatan'] as $key => $item) {
            $data['tim'][$key] = $this->tim_kerja_m->show_tim_kerja($item['id_tim_kerja']);
        }

        // var_dump($data['tim_kerja']);

        $filter['bps'] = $this->BPS_m->list_bps();
        $filter['periode'] = $this->Periode_m->list_periode();
        $filter['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();


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
        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['detail_kegiatan']['id_tim_kerja']);


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
        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['detail_kegiatan']['id_tim_kerja']);
        // var_dump($data['tim_kerja']);
        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/editKegiatanView');
        $this->load->view('template/footer');
    }


    public function tambahKegiatan()
    {
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Kegiatan BPS";

        $data['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();

        $this->load->view('template/header', $data);
        $this->load->view('template/topNav', $data);
        $this->load->view('monitoring/tambahKegiatan');
        $this->load->view('template/footer');
    }

    public function addKegiatan()
    {
        $data = array();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
        $this->form_validation->set_rules('id_tim_kerja', 'Kode Tim Kerja', 'trim|required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

        $hasil = $this->Kegiatan_m->add_kegiatan();
        // var_dump($data);

        if ($hasil['point'] == 'sukses') {
            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Buat Kegiatan</div> ');
            redirect('monitoring/kegiatan', 'refresh');
        } else if ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tgl_start'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
            redirect('monitoring/kegiatan', 'refresh');
        } else if ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Kegiatan untuk Tanggal ' . $hasil['tgl_start'] . ' Sudah Penuh</h1></div> ');
            redirect('monitoring/kegiatan', 'refresh');
        }
    }


    public function updateKegiatan($id)
    {

        $data = array();


        $hasil = $this->Kegiatan_m->update_kegiatan($id);


        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Pesan Zoom</div> ');
            redirect('monitoring/kegiatan', 'refresh');
        } else if ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tanggal'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
            redirect('monitoring/kegiatan/editkegiatan/' . $id, 'refresh');
        } else if ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Zoom untuk Tanggal ' . $hasil['tanggal'] . ' Sudah Penuh</h1></div> ');
            redirect('monitoring/kegiatan/editkegiatan/' . $id, 'refresh');
        }
    }
}
