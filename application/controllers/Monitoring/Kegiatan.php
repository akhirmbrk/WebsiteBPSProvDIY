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
        $data['title'] = "Kegiatan";

        $filter['periode'] = $this->Periode_m->list_periode();
        $filter['tim_kerja'] = $this->tim_kerja_m->list_filter_teamkerja($Periode = 0);
        // var_dump($filter);
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
            'periode' => $this->input->post('filterPeriode'),
            'timKerja' => $this->input->post('filterTimKerja')
        );
        // var_dump($search);

        $this->load->library('pagination');

        $config['base_url'] = "http://localhost/WebsiteBPSProvDIY/Monitoring/Kegiatan/indexAjax";
        $data['start'] = $this->uri->segment(4);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->Kegiatan_m->get_kegiatan_live($config['per_page'], $data['start'], $search, $count = true);

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);



        $data['kodeKabKota'] = $this->BPS_m->list_bps();
        // die;
        $data['list_kegiatan'] = $this->Kegiatan_m->get_kegiatan_live($config['per_page'], $data['start'], $search, $count = false);


        foreach ($data['list_kegiatan'] as $key => $item) {
            $data['list_sub_kegiatan'][$key] = $this->Kegiatan_m->get_sub_kegiatan_live($item['id_kegiatan']);
            $data['tim'][$key] = $this->tim_kerja_m->show_tim_kerja($item['id_tim_kerja']);
        }


        $this->load->vars($data);

        $this->load->view('monitoring/kegiatanAjaxView');
    }

    public function detailKegiatan($id, $kodeKabKota)
    {
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 70;
        $data['title'] = "Kegiatan Monitoring BPS";

        $data['kodeKabKota'] = $kodeKabKota;
        $data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);
        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['detail_kegiatan']['id_tim_kerja']);

        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/detailKegiatanView');
        $this->load->view('template/footer');
    }

    public function editKegiatan($id, $kodeKabKota)
    {
        // CEK ROLE USER
        $role = [1, 6];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Edit Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['progress'] = 70;
        $data['title'] = "Kegiatan Monitoring BPS";

        $data['kodeKabKota'] = $kodeKabKota;
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
        // CEK ROLE USER
        $role = [1];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Tambah Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

        $tgl = date('Y-m-d', strtotime(' +0 day'));

        $tgl_dh_1 = substr($tgl, 8, 2);
        $bln_dh_1 = substr($tgl, 5, 2);
        $thn_dh_1 = substr($tgl, 0, 4);
        $data['tanggal_now'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;

        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Kegiatan BPS";

        $data['tim_kerja'] = $this->tim_kerja_m->list_filter_teamkerja(0);

        $this->load->view('template/header', $data);
        $this->load->view('template/topNav', $data);
        $this->load->view('monitoring/tambahKegiatanView', $data);
        $this->load->view('template/footer');
    }

    public function addKegiatan()
    {
        // CEK ROLE USER
        $role = [1];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Tambah Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

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

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Waktu Mulai Kegiatan Sudah Berlalu</div> ');
            redirect('Monitoring/Kegiatan/tambahKegiatan', 'refresh');
        } elseif ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Menambahkan Kegiatan</div> ');
            redirect('Monitoring/Kegiatan/tambahKegiatan', 'refresh');
        }
    }


    public function updateKegiatan($id, $kodeKabKota)
    {
        // CEK ROLE USER
        $role = [1, 6];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Update Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

        $data = array();


        $hasil = $this->Kegiatan_m->update_kegiatan($id, $kodeKabKota);


        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Mengupdate Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } else {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Mengupdate Kegiatan</div> ');
            redirect('Monitoring/Kegiatan/editKegiatanView', 'refresh');
        }
    }

    public function hapusKegiatan($id)
    {
        // CEK ROLE USER
        $role = [1, 2];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Hapus Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

        $this->Kegiatan_m->hapus_kegiatan($id);
        $this->session->set_flashdata('info_form', '<div class="alert alert-\ alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Hapus Kegiatan</div> ');
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
        // CEK ROLE USER
        $role = [1, 2];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Tambah Sub-Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

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

        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($parentKegiatan[0]['id_tim_kerja']);

        $this->load->view('template/header', $data);
        $this->load->view('template/topNav', $data);
        $this->load->view('monitoring/tambahSubKegiatanView', $data);
        $this->load->view('template/footer');
    }

    public function addSubKegiatan()
    {
        // CEK ROLE USER
        $role = [1, 2];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Tambah Sub-Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------

        $data = array();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul_kegiatan', 'Judul Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_start', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('tgl_end', 'Tanggal Selesai', 'trim|required');
        $this->form_validation->set_rules('id_tim_kerja', 'Kode Tim Kerja', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

        $hasil = $this->Kegiatan_m->add_sub_kegiatan();
        // var_dump($data);

        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Menambahkan Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } else if ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Menambahkan Kegiatan Tangal Lewat</div> ');
            redirect('Monitoring/Kegiatan/tambahSubKegiatan/' . $this->input->post('id_parent_kegiatan'), 'refresh');
        } else if ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Menambahkan Kegiatan Tangal Block</div> ');
            redirect('Monitoring/Kegiatan/tambahSubKegiatan/' . $this->input->post('id_parent_kegiatan'), 'refresh');
        }
    }
}
