<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TimKerja extends CI_Controller
{
    public $BPS_m;
    public $load;
    public $session;
    public $User_m;
    public $All_m;
    public $Kegiatan_m;
    public $tim_kerja_m;
    public $Periode_m;
    public $Z_anggotateam_m;
    public $form_validation;
    public $input;
    public $pagination;
    public $uri;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->model('monitoring/Kegiatan_m');
        $this->load->model('monitoring/BPS_m');
        $this->load->model('monitoring/Periode_m');
        $this->load->model('monitoring/tim_kerja_m');
        $this->load->model('monitoring/Z_anggotateam_m');
        //session_name("ckp34");
        if (!(isset($_SESSION['nip']))) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
            redirect('sso/index', 'refresh');
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['tabTim'] = "1";
        $data['tab'] = "4";
        $data['tipe'] = "1";
        $data['title'] = "Tim Kerja";

        $nip = $_SESSION['nip'];
        $filter['periode'] = $this->Periode_m->list_periode();
        $filter['tim_kerja'] = $this->tim_kerja_m->list_filter_teamkerja($periode = 0);

        // var_dump($filter['tim_kerja']);
        // $data['teams'] = $this->Z_anggotateam_m->get_teams($config['per_page'], $data['start']);;

        $this->load->vars($data);
        $this->load->vars($filter);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/timKerjaView');
        $this->load->view('template/footer');
    }

    public function indexAjax()
    {
        $search = array(
            'keyword' => trim($this->input->post('searchTimKerja')),
            'periode' => $this->input->post('filterPeriode')
        );

        // var_dump($search);
        $this->load->library('pagination');

        $config['base_url'] = "http://localhost/WebsiteBPSProvDIY/Monitoring/TimKerja/indexAjax";
        $data['start'] = $this->uri->segment(4);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->tim_kerja_m->list_teamkerja($config['per_page'], $data['start'], $search, $count = true);
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        // $data['teams'] = $this->Z_anggotateam_m->get_teams_live($config['per_page'], $data['start'], $search, $count = false);
        $data['teams'] = $this->tim_kerja_m->list_teamkerja($config['per_page'], $data['start'], $search, $count = false);

        // var_dump($data['teams']);

        $this->load->vars($data);
        $this->load->view('monitoring/timKerjaAjaxView');
    }


    public function tambahTimKerja()
    {

        // if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
        //     $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Tim Kerja</div>');
        //     redirect('Monitoring/TimKerja', 'refresh');
        // }


        $data['tab'] = "4";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Tim Kerja BPS";

        $filter['periode'] = $this->Periode_m->list_periode_create();
        // $periode = 3 untuk referensi nama tim di tahun 2023 yang sudah lengkap
        $filter['tim_kerja'] = $this->tim_kerja_m->list_filter_teamkerja($periode = 3);

        $this->load->vars($data);
        $this->load->vars($filter);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/tambahTimKerjaView');
        $this->load->view('template/footer');
    }

    public function tambahAnggotaTimKerja($idTim)
    {

        // if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
        //     $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Tim Kerja</div>');
        //     redirect('Monitoring/Kegiatan', 'refresh');
        // }


        $data['tab'] = "4";
        $data['tipe'] = "1";
        $data['title'] = "Tambah Tim Kerja BPS";
        $data['idTim'] = $idTim;
        $tim = $this->tim_kerja_m->show_tim_kerja($idTim);
        $data['namaTim'] = $tim['nama_team'];
        $data['periodeTim'] = $this->Periode_m->show_periode($tim['id_zperiode']);


        $filter['tim_kerja'] = $this->tim_kerja_m->list_filter_teamkerja($periode = 0);



        $this->load->vars($data);
        $this->load->vars($filter);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/tambahAnggotaTimKerjaView');
        $this->load->view('template/footer');
    }

    public function addTimUser()
    {
        // if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
        //     $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Tambah Tim Kerja</div>');
        //     redirect('Monitoring/TimKerja', 'refresh');
        // }
        $this->load->library('form_validation');

        $this->form_validation->set_rules('timKerja', 'Tim Kerja', 'trim|required');
        $this->form_validation->set_rules('periode', 'Periode', 'trim|required');
        $this->form_validation->set_rules('anggota', 'Anggota', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');


        $member = $this->input->post('sample-typeahead');
        $arr_member = explode(",", $member);
        // var_dump($arr_member);

        foreach ($arr_member as $item) {
            $coba[] = $this->User_m->detail_user_by_name($item);
        }
        // var_dump($coba);

        $idTim = $this->input->post("timKerja");
        $idPeriode = $this->input->post("periode");


        // var_dump($namaTeam);

        foreach ($coba as $indeks => $item) {
            if ($indeks == 0) {
                $ketua = $item['ida'];
                // $ketua = 0;
            }
            // var_dump($item['ida']);
            $hasil = $this->Z_anggotateam_m->add_teams($item['ida'], $idTim);
        };
        $this->tim_kerja_m->update_teams($idTim, $ketua);

        // var_dump($ketua);

        // // var_dump($namaTeam);

        if ($hasil['point'] == 'sukses') {
            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Menambahkan Tim Kerja</div> ');
            redirect('Monitoring/TimKerja', 'refresh');
        } else {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Menambahkan Tim Kerja</div> ');
            redirect('Monitoring/TimKerja/tambahTimKerja', 'refresh');
        }
    }

    public function createTimUser()
    {
        // if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
        //     $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak Memiliki Akses ke Tambah Tim Kerja</div>');
        //     redirect('Monitoring/Kegiatan', 'refresh');
        // }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('timKerja', 'Tim Kerja', 'trim|required');
        $this->form_validation->set_rules('periode', 'Periode', 'trim|required');

        $this->form_validation->set_message('required', '%s mohon diisi terlebih dahulu');

        $namaTeam = $this->input->post('timKerja');
        $periode = $this->input->post('periode');

        // var_dump($namaTeam);
        // var_dump($periode);
        $data = $this->tim_kerja_m->show_tim_kerja_bynama($namaTeam, $periode);
        // var_dump($data == null);
        if ($data == null) {
            $hasil = $this->tim_kerja_m->add_teams($namaTeam, $periode);
        } else {
            $hasil['point'] = 'gagal';
        }


        if ($hasil['point'] == 'sukses') {
            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Menambahkan Tim Kerja</div> ');
            redirect('Monitoring/TimKerja', 'refresh');
        } elseif ($hasil['point'] == 'gagal') {
            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal Menambahkan Tim Kerja atau Tim Kerja Sudah Ada</div> ');
            redirect('Monitoring/TimKerja/tambahTimKerja', 'refresh');
        }
    }

    public function detailTimKerja($id, $periode)
    {
        $data['tab'] = "4";
        $data['tipe'] = "1";
        $data['title'] = "Tim Kerja Monitoring BPS";


        $data['member'] = $this->Z_anggotateam_m->list_anggota_team($id, $periode);

        $data['idTim'] = $id;

        $this->load->vars($data);
        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/detailTimKerjaView');
        $this->load->view('template/footer');
    }

    public function hapusTimKerja($team, $bps, $periode)
    {
        // if (($_SESSION['user_role'] == 4) || ($_SESSION['user_role'] == 5) || ($_SESSION['user_role'] == 6)) {
        //     $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses ke Hapus Tim Kerja</div>');
        //     redirect('Monitoring/TimKerja', 'refresh');
        // }
        $this->Z_anggotateam_m->hapus_tim_kerja($team, $bps, $periode);
        $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Hapus Tim Kerja</div> ');
        redirect('Monitoring/TimKerja', 'refresh');
    }

    public function AllUserProv()
    {

        $dataeven = $this->User_m->list_user_prov();


        $ff = json_encode($dataeven);

        header('Content-Type: application/json');
        echo $ff;
    }
}
