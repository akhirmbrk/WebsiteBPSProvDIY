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
			$_SESSION['kodeKabKota'] = $pdf['kodeKabKota'];

			redirect('landingpage/index', 'refresh');
			// redirect('landingBaru/index', 'refresh');
		}

		//simpan session
		//redirect
	}


	function lout()
	{

		// unset($_SESSION);
		session_destroy();

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
		// $_SESSION['user_role'] = array();

		// Coba Role SUper Admin
		$_SESSION['nama'] = "Isdiyanto SST, M.T.";
		$_SESSION['getprop'] = "34";
		$_SESSION['nip'] = "340054255";
		$_SESSION['kodeKabKota'] = "00";

		// COBA ROLE Admin Monitor, zoom, bidang
		// $_SESSION['nama'] = "Rahmawati, SE, MA";
		// $_SESSION['getprop'] = "34";
		// $_SESSION['nip'] = "340013059";
		// $_SESSION['kodeKabKota'] = "00";

		// Coba Role Provinsi
		// $_SESSION['nama'] = "Helida Nurcahayani, SST, M.Si";
		// $_SESSION['getprop'] = "34";
		// $_SESSION['nip'] = "340019189";
		// $_SESSION['kodeKabKota'] = "00";

		// // COBA ROLE User KabKota
		// $_SESSION['nama'] = "User Kab/Kota";
		// $_SESSION['getprop'] = "34";
		// $_SESSION['nip'] = "340024494";
		// $_SESSION['kodeKabKota'] = "71"; // DIY
		// $_SESSION['kodeKabKota'] = "01"; // Kulon Progo
		// $_SESSION['kodeKabKota'] = "02"; // Bantul
		// $_SESSION['kodeKabKota'] = "03"; // Gunungkidul
		// $_SESSION['kodeKabKota'] = "04"; // Sleman






		$nipUser = $this->All_m->cekUserExist($_SESSION['nip'], $_SESSION['nama'], $_SESSION['kodeKabKota']);

		// var_dump($user);
		$AksesUser = $this->All_m->list_user_access($nipUser);
		// die;
		if (count($AksesUser) > 0) {
			foreach ($AksesUser as $i => $value) {
				$_SESSION['user_role'][$i] = (int)$value['id_role'];
			};
		} else {
			$_SESSION['user_role'][0] = 7;
		}
		// die;

		redirect('landingpage/index', 'refresh');
		// redirect('landingBaru/index', 'refresh');
		// http://localhost:8080/zoom/index.php/sso/dummylogin

	}
}
