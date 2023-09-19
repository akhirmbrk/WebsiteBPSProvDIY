<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sso extends CI_Controller
{
	public $load;
	public $All_m;
	public $sso_bps;
	public $session;

	function index()
	{
		$this->load->model('All_m');
		$this->load->library('sso_bps');
		$pdf = $this->sso_bps->load();
		//echo $pdf['nama'];
		//echo $pdf['nip'];

		if ($pdf['getprop'] == 34) {

			$this->All_m->cekUserExist($pdf['nip'], $pdf['nama']);

			$_SESSION['nama'] = $pdf['nama'];
			$_SESSION['getprop'] = $pdf['getprop'];
			$_SESSION['nip'] = $pdf['nip'];

			redirect('landingpage/index', 'refresh');
			// redirect('landingBaru/index', 'refresh');
		}

		//simpan session
		//redirect
	}


	function lout()
	{

		unset($_SESSION);
		// unset($_SESSION['getprop']);
		// if (isset($_SESSION['roleSuperAdmin'])) {
		// 	unset($_SESSION['roleSuperAdmin']);
		// } elseif (isset($_SESSION['roleAdminTKProv'])) {
		// 	unset($_SESSION['roleAdminTKProv']);
		// } elseif (isset($_SESSION['roleAdminTKKabkota'])) {
		// 	unset($_SESSION['roleAdminTKKabkota']);
		// } elseif (isset($_SESSION['roleKepalaProv'])) {
		// 	unset($_SESSION['roleKepalaProv']);
		// } elseif (isset($_SESSION['roleKepalaKabkota'])) {
		// 	unset($_SESSION['roleKepalaKabkota']);
		// } elseif (isset($_SESSION['roleKetuaTKProv'])) {
		// 	unset($_SESSION['roleKetuaTKProv']);
		// }

		//unset($_SESSION['getUrlFoto']);

		redirect('home/index', 'refresh'); // Sementara untuk dummy login
		$this->load->library('sso_bps');
		$pdf = $this->sso_bps->lout();
		//echo $pdf;
	}

	function dummylogin()
	{
		$this->load->model('All_m');
		$this->load->library('session');
		$_SESSION['nama'] = "Isdiyanto SST, M.T.";
		$_SESSION['getprop'] = "34";
		$_SESSION['nip'] = "340054255";

		// $_SESSION['nama'] = "Muhammad Afnan Falieh, Otw. Str.Stat";
		// $_SESSION['getprop'] = "34";
		// $_SESSION['nip'] = "340024494";

		$user = $this->All_m->cekUserExist($_SESSION['nip'], $_SESSION['nama']);

		// if ($user[0]['super_admin'] == '1') {
		// 	if ($user[0]['admin_tim_kerja_prov'] == '1') {
		// 		$_SESSION['user_role'] = 2;
		// 	} elseif ($user[0]['admin_tim_kerja_kabkota'] == '1') {
		// 		$_SESSION['user_role'] = 3;
		// 	} else {
		// 		$_SESSION['user_role'] = 1;
		// 	}
		// } elseif ($user[0]['admin_tim_kerja_prov'] == '1') {
		// 	$_SESSION['user_role'] = 4;
		// } elseif ($user[0]['admin_tim_kerja_kabkota'] == '1') {
		// 	$_SESSION['user_role'] = 5;
		// } else {
		// 	$_SESSION['user_role'] = 6;
		// }

		// var_dump($this->session->userdata('user_role'));
		// var_dump($_SESSION);



		redirect('landingpage/index', 'refresh');
		// redirect('landingBaru/index', 'refresh');
		// http://localhost:8080/zoom/index.php/sso/dummylogin

	}
}
