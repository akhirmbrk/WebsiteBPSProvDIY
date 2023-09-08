<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public $load;
    public $User_m;
    public $session;
    public $input;
    public $pagination;
    public $uri;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        //session_name("ckp34");
        if (!(isset($_SESSION['nip']))) {
            $this->session->set_flashdata('info_form', ' <div class="alert alert-block alert-danger">Mohon Login Terlebih Dahulu</div>');
            redirect('sso/index', 'refresh');
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        // $this->load->library('pagination');

        // $config['base_url'] = "http://localhost/WebsiteBPSProvDIY/monitoring/User/index";
        // $config['total_rows'] = $this->User_m->get_jumlah_user();
        // $config['per_page'] = 5;

        // $config['attributes'] = array('class' => 'page-link');

        // $this->pagination->initialize($config);


        $data['tab'] = "2";
        $data['tipe'] = "1";
        $data['title'] = "User Utama";
        // $data['start'] = $this->uri->segment(4);

        // $data['users'] = $this->User_m->get_users($config['per_page'], $data['start']);
        // // var_dump($data['users']);
        $this->load->vars($data);

        $this->load->view('template/header');
        $this->load->view('template/topNav');
        $this->load->view('monitoring/userControlView');
        $this->load->view('template/footer');
    }

    public function indexAjax()
    {
        $search = array(
            'keyword' => trim($this->input->post('searchUser')),
        );

        $this->load->library('pagination');

        $config['base_url'] = "http://localhost/WebsiteBPSProvDIY/monitoring/User/indexAjax";
        $data['start'] = $this->uri->segment(4);
        $config['per_page'] = 5;
        $config['total_rows'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = true);

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $data['tab'] = "2";
        $data['tipe'] = "1";
        $data['title'] = "User Utama";

        $data['users'] = $this->User_m->get_users_live($config['per_page'], $data['start'], $search, $count = false);
        // var_dump($data['users']);
        $this->load->vars($data);


        $this->load->view('monitoring/userAjaxView');
    }


    public function editRole()
    {


        $id = $this->input->post('idEdit');
        $hasil = $this->User_m->edit_role_user($id);


        if ($hasil['point'] == 'sukses') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Berhasil Pesan Zoom</div> ');
            redirect('Monitoring/User', 'refresh');
        } else if ($hasil['point'] == 'lewat') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h1>Tanggal ' . $hasil['tanggal'] . ' Sudah Lewat Atau Format Salah</h1></div> ');
            redirect('Monitoring/User', 'refresh');
        } else if ($hasil['point'] == 'block') {

            $this->session->set_flashdata('info_form', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h1> Jadwal Zoom untuk Tanggal ' . $hasil['tanggal'] . ' Sudah Penuh</h1></div> ');
            redirect('Monitoring/User', 'refresh');
        }
    }
}
