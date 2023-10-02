<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexAdmin extends CI_Controller
{
    public $load;
    public $User_m;
    public $All_m;
    public $session;
    public $input;
    public $pagination;
    public $uri;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->model('All_m');
        //session_name("ckp34");
        if (!(isset($_SESSION['nip']))) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
            redirect('sso/index', 'refresh');
        }

        // CEK ROLE USER
        $role = [1, 2, 3, 4];
        $akses = $this->All_m->cek_akses_user($_SESSION['nip'], $role);
        if ($akses < 1) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Anda Tidak Memiliki Akses</div>');
            redirect('Landingpage', 'refresh');
        }
        //-------------------

        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['tipe'] = "3";
        $data['dash_admin'] = '1';
        $data['title'] = "Dashboard Admin";


        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/sidetopbaradmin');
        $this->load->view('admin/indexAdminView');
        $this->load->view('template/footer');
    }
}
