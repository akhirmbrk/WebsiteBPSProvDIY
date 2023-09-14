<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    public $load;
    public $input;
    public $session;
    public $form_validation;
    public $All_m;
    public $Kegiatan_m;
    public $BPS_m;
    public $tim_kerja_m;
    public $Periode_m;
    public $pagination;
    public $uri;

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

        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data['tabKegiatan'] = "1";
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 76;
        $data['title'] = "Kegiatan";

        // $data['start'] = $this->uri->segment(4);

        // $data['list_kegiatan'] = $this->Kegiatan_m->get_kegiatan($config['per_page'], $data['start']);

        // foreach ($data['list_kegiatan'] as $key => $item) {
        //     $data['tim'][$key] = $this->tim_kerja_m->show_tim_kerja($item['id_tim_kerja']);
        // }

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

    public function indexAjax()
    {
        $search = array(
            'keyword' => trim($this->input->post('searchKegiatan')),
        );

        $this->load->library('pagination');

        $config['base_url'] = "http://localhost/WebsiteBPSProvDIY/monitoring/kegiatan/indexAjax";
        $data['start'] = $this->uri->segment(4);
        $config['per_page'] = 2;
        $config['total_rows'] = $this->Kegiatan_m->get_kegiatan_live($config['per_page'], $data['start'], $search, $count = true);

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);



        $data['list_kegiatan'] = $this->Kegiatan_m->get_kegiatan_live($config['per_page'], $data['start'], $search, $count = false);


        foreach ($data['list_kegiatan'] as $key => $item) {
            $data['list_sub_kegiatan'][$key] = $this->Kegiatan_m->get_sub_kegiatan_live($item['id_kegiatan']);
            $data['tim'][$key] = $this->tim_kerja_m->show_tim_kerja($item['id_tim_kerja']);
        }
        // $data['list_sub_kegiatan'] = $this->Kegiatan_m->get_id_parent_kegiatan();
        // var_dump($data['list_sub_kegiatan'][0][0]['judul_kegiatan']);


        // var_dump($this->input->post('id'));


        $this->load->vars($data);

        $this->load->view('monitoring/kegiatanAjaxView');
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

        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Edit Sub Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }


        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 70;
        $data['title'] = "Kegiatan Monitoring BPS";

        $data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);
        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['detail_kegiatan']['id_tim_kerja']);

        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/editKegiatanView');
        $this->load->view('template/footer');
    }


    public function tambahKegiatan()
    {
        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $tgl = date('Y-m-d', strtotime(' +0 day'));

        $tgl_dh_1 = substr($tgl, 8, 2);
        $bln_dh_1 = substr($tgl, 5, 2);
        $thn_dh_1 = substr($tgl, 0, 4);
        $data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Kegiatan BPS";

        $data['bps'] = $this->BPS_m->list_bps();


        $data['tim_kerja'] = $this->tim_kerja_m->list_tim_kerja();

        $this->load->view('template/header', $data);
        $this->load->view('template/topNav', $data);
        $this->load->view('monitoring/tambahKegiatanView', $data);
        $this->load->view('template/footer');
    }

    public function addKegiatan()
    {
        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
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

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Menambahkan Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } elseif ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Waktu Mulai Kegiatan Sudah Berlalu</h1></div> ');
            redirect('Monitoring/Kegiatan/tambahKegiatan', 'refresh');
        } elseif ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Gagal Menambahkan Kegiatan</h1></div> ');
            redirect('Monitoring/Kegiatan/tambahKegiatan', 'refresh');
        }
    }


    public function updateKegiatan($id, $parent)
    {

        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Edit Sub Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $data = array();


        $hasil = $this->Kegiatan_m->update_kegiatan($id, $parent);


        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Mengupdate Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } else {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Gagal Mengupdate Kegiatan</h1></div> ');
            redirect('Monitoring/Kegiatan/editKegiatanView', 'refresh');
        }
    }

    public function hapusKegiatan($id)
    {
        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 3) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Hapus Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }


        $this->Kegiatan_m->hapus_kegiatan($id);
        $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Berhasil Hapus Kegiatan</div> ');
        redirect('monitoring/kegiatan', 'refresh');
    }

    public function filterKegiatan()
    {
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 76;
        $data['title'] = "Kegiatan";

        $data['list_kegiatan'] = $this->Kegiatan_m->filter_kegiatan($this->input->post('filterTimKerja'));

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

    public function tambahSubKegiatan($idParent)
    {
        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 3) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Sub Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $parentKegiatan = $this->Kegiatan_m->show_kegiatan($idParent);

        // $tgl = date('Y-m-d', strtotime(' +0 day'));
        $tgl = $parentKegiatan[0]['tgl_start'];
        // var_dump($parentKegiatan[0]['tgl_start']);

        $tgl_dh_1 = substr($tgl, 8, 2);
        $bln_dh_1 = substr($tgl, 5, 2);
        $thn_dh_1 = substr($tgl, 0, 4);

        // var_dump($tgl_dh_1 . '/' . $bln_dh_1 . '/' . $thn_dh_1);

        $data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

        // // var_dump($idParent);

        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Kegiatan BPS";

        $data['id_parent'] = $idParent;
        $data['bps'] = $this->BPS_m->list_bps();


        $data['parent_BPS'] = $this->BPS_m->show_bps($parentKegiatan[0]['KodeBPS']);
        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($parentKegiatan[0]['id_tim_kerja']);

        $this->load->view('template/header', $data);
        $this->load->view('template/topNav', $data);
        $this->load->view('monitoring/tambahSubKegiatanView', $data);
        $this->load->view('template/footer');
    }

    public function addSubKegiatan()
    {
        if (($_SESSION['user_role'] == 1) || ($_SESSION['user_role'] == 3) || ($_SESSION['user_role'] == 6)) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Sub Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $data = array();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
        $this->form_validation->set_rules('id_tim_kerja', 'Kode Tim Kerja', 'trim|required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

        $hasil = $this->Kegiatan_m->add_sub_kegiatan();
        // var_dump($data);

        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Menambahkan Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } else if ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Gagal Menambahkan Kegiatan Tangal Lewat</h1></div> ');
            redirect('Monitoring/Kegiatan/tambahSubKegiatan/' . $this->input->post('id_parent_kegiatan'), 'refresh');
        } else if ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h1>Gagal Menambahkan Kegiatan Tangal Block</h1></div> ');
            redirect('Monitoring/Kegiatan/tambahSubKegiatan/' . $this->input->post('id_parent_kegiatan'), 'refresh');
        }
    }
}
