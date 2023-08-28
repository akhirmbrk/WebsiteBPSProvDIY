<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
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
        $defadata = $this->All_m->top_bar();
        if ($defadata['admin_zoom'] != 1) {
            redirect('zoom/zoomorder/index/', 'refresh');
        }

        date_default_timezone_set("Asia/Bangkok");
    }
    public function index()
    {
        $data['title'] = "Dashboard Utama";
        $this->load->view('monitoring/template/header', $data);
        // $this->load->view('monitoring/template/topNav', $data);
        // $this->load->view('rapatoffline/indexView');
        $this->load->view('maintenanceView');
        // $this->load->view('monitoring/template/footer');
    }
}
