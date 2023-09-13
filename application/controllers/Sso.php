<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sso extends CI_Controller
{
	public $load;
	public $All_m;
	public $sso_bps;

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
		// $_SESSION['nama'] = "Isdiyanto SST, M.T.";
		// $_SESSION['getprop'] = "34";
		// $_SESSION['nip'] = "340054255";		

		$_SESSION['nama'] = "Muhammad Afnan Falieh, Otw. Str.Stat";
		$_SESSION['getprop'] = "34";
		$_SESSION['nip'] = "222011494";

		$user = $this->All_m->cekUserExist($_SESSION['nip'], $_SESSION['nama']);

		if ($user[0]['super_admin'] == '1') {
			$_SESSION['roleSuperAdmin'] = 1;
		} elseif ($user[0]['admin_tim_kerja_prov'] == '1') {
			$_SESSION['roleAdminTKProv'] = 1;
		} elseif ($user[0]['admin_tim_kerja_kabkota'] == '1') {
			$_SESSION['roleAdminTKKabkota'] = 1;
		} elseif ($user[0]['kepala_prov'] == '1') {
			$_SESSION['roleKepalaProv'] = 1;
		} elseif ($user[0]['kepala_kabkota'] == '1') {
			$_SESSION['roleKepalaKabkota'] = 1;
		} elseif ($user[0]['ketua_tim_kerja_prov'] == '1') {
			$_SESSION['roleKetuaTKProv'] = 1;
			// } else {
			// 	$_SESSION['roleSuperAdmin'] = null;
			// 	$_SESSION['roleAdminTKProv'] = null;
			// 	$_SESSION['roleAdminTKKabkota'] = null;
			// 	$_SESSION['roleKepalaProv'] = null;
			// 	$_SESSION['roleKepalaKabkota'] = null;
			// 	$_SESSION['roleKetuaTKProv'] = null;
		}

		// var_dump($_SESSION);



		// redirect('landingpage/index', 'refresh');
		// redirect('landingBaru/index', 'refresh');
		// http://localhost:8080/zoom/index.php/sso/dummylogin

	}
}
