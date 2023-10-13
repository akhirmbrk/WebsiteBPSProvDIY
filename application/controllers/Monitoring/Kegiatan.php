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
    public $Progres_Kegiatan_m;
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
        $this->load->model('monitoring/Progres_Kegiatan_m');
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

        $data['progres_kegiatan'] = $this->Progres_Kegiatan_m->list_progres_tiap_kegiatan();
        // var_dump($data['progres_kegiatan']);
        // die;

        foreach ($data['list_kegiatan'] as $key => $item) {
            $data['list_sub_kegiatan'][$key] = $this->Kegiatan_m->get_sub_kegiatan_live($item['id_kegiatan']);
            $data['tim'][$key] = $this->tim_kerja_m->show_tim_kerja($item['id_tim_kerja']);
            $data['progres_kegiatan'][$key] = [];

            foreach ($data['list_sub_kegiatan'][$key] as $i => $sub) {
                $data['progres_kegiatan'][$key][$i] = [];

                foreach ($data['kodeKabKota'] as $j => $value) {
                    $progres = $this->Progres_Kegiatan_m->show_progres_tiap_kegiatan($sub['id_kegiatan'], $value['kode']);
                    $data['progres_kegiatan'][$key][$i][$j] = $progres;
                }
            }
        }

        $this->load->vars($data);

        $this->load->view('monitoring/kegiatanAjaxView');
    }

    public function detailKegiatan($id, $kodeKabKota)
    {
        // Cek Kesesuaian kode kabkode user dengan yang akan diedit
        if ($_SESSION['kodeKabKota'] != $kodeKabKota && $_SESSION['kodeKabKota'] != "00") {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        $data['tab'] = "3";
        $data['tipe'] = "1";
        $data['title'] = "Kegiatan Monitoring BPS";

        $data['kodeKabKota'] = $kodeKabKota;
        // $data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);

        $data['progres_kegiatan'] = $this->Progres_Kegiatan_m->show_progres_tiap_kegiatan($id, $kodeKabKota);
        // var_dump($data['progres_kegiatan']);

        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['progres_kegiatan']['id_tim_kerja']);

        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/detailKegiatanView');
        $this->load->view('template/footer');
    }

    public function editKegiatan($id, $kodeKabKota)
    {
        // CEK ROLE USER
        $role = [1, 2];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Edit Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------
        // Cek Kesesuaian kode kabkode user dengan yang akan diedit
        if ($_SESSION['kodeKabKota'] != $kodeKabKota && $_SESSION['kodeKabKota'] != "00") {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $data['tab'] = "3";
        $data['tipe'] = "1";

        $data['title'] = "Kegiatan Monitoring BPS";

        $data['kodeKabKota'] = $kodeKabKota;
        // $data['detail_kegiatan'] = $this->Kegiatan_m->detail_kegiatan($id);

        $data['progres_kegiatan'] = $this->Progres_Kegiatan_m->show_progres_tiap_kegiatan($id, $kodeKabKota);

        $data['tim_kerja'] = $this->tim_kerja_m->show_tim_kerja($data['progres_kegiatan']['id_tim_kerja']);

        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/editKegiatanView');
        $this->load->view('template/footer');
    }


    public function updateKegiatan($idk, $kodeKabKota)
    {
        // CEK ROLE USER
        $role = [1, 2];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Update Kegiatan</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }
        //-------------------
        // Cek Kesesuaian kode kabkode user dengan yang akan diedit
        if ($_SESSION['kodeKabKota'] != $kodeKabKota && $_SESSION['kodeKabKota'] != "00") {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
            redirect('Monitoring/Kegiatan', 'refresh');
        }

        $data = array();


        // $hasil = $this->Kegiatan_m->update_kegiatan($id, $kodeKabKota);
        $progres = $this->Progres_Kegiatan_m->show_progres_tiap_kegiatan($idk, $kodeKabKota);
        // var_dump($progres);
        // die;

        if (count($progres)) {
            $idp = $progres['id_pkegiatan'];
        } else {
            $idp = 0;
        }
        // var_dump($idp);
        // die;

        $hasil = $this->Progres_Kegiatan_m->update_progres($idp, $idk, $kodeKabKota);


        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Mengupdate Kegiatan</div> ');
            redirect('Monitoring/Kegiatan', 'refresh');
        } else {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Mengupdate Kegiatan</div> ');
            redirect('Monitoring/Kegiatan/editKegiatanView', 'refresh');
        }
    }



    public function filterKegiatan()
    {
        $data['tab'] = "3";
        $data['tipe'] = "1";
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
}
