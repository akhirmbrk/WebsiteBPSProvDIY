<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class All_m extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}


	public function addorder()
	{

		$tgl_dh_1 = substr($this->input->post("tgl_start"), 3, 2);
		$bln_dh_1 = substr($this->input->post("tgl_start"), 0, 2);
		$thn_dh_1 = substr($this->input->post("tgl_start"), 6, 4);
		$tgl_start = $thn_dh_1 . "-" . $bln_dh_1 . "-" . $tgl_dh_1 . " " . $this->input->post("time_start");


		$tgl_dh_2 = substr($this->input->post("tgl_end"), 3, 2);
		$bln_dh_2 = substr($this->input->post("tgl_end"), 0, 2);
		$thn_dh_2 = substr($this->input->post("tgl_end"), 6, 4);
		$tgl_end = $thn_dh_2 . "-" . $bln_dh_2 . "-" . $tgl_dh_2 . " " . $this->input->post("time_end");


		//validasi dan pesan error

		// jika waktu kurang
		$unix_now = strtotime("now");

		$unix_tgl_start = strtotime($tgl_start);
		$unix_tgl_end = strtotime($tgl_end);

		$jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) ) ee WHERE status <> 2");

		$jedah_res = $jedah->row_array();

		$keterangan = $this->input->post("keterangan");
		$ruangan = 'Zoom';

		if ($keterangan == 1) {
			$ruangan = $this->input->post("ruangan");
		}

		if ($unix_now > $unix_tgl_start || $unix_now > $unix_tgl_end || $unix_tgl_start > $unix_tgl_end) {
			$hasil['point'] = 'lewat';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else if ($jedah_res['jumlah'] > 1) {
			$hasil['point'] = 'block';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else {
			$data = array(
				'perihal' => $this->input->post("perihal"),
				'tgl_start' => $tgl_start,
				'tgl_end' => $tgl_end,
				'oleh' => $_SESSION['nip'],
				'status' => 0,
				'jumlah_peserta' => $this->input->post("jumlah_peserta"),
				'tgl_pengajuan' => date("Y-m-d"),
				'namapengusul' => $_SESSION['nama'],
				'keterangan' => $keterangan,
				'ruangan' => $ruangan
			);
			$this->db->insert('meetingreq', $data);
			$hasil['point'] = 'sukses';
		}


		return $hasil;
	}

	public function editzoomcek($idm)
	{

		$tgl_dh_1 = substr($this->input->post("tgl_start"), 3, 2);
		$bln_dh_1 = substr($this->input->post("tgl_start"), 0, 2);
		$thn_dh_1 = substr($this->input->post("tgl_start"), 6, 4);
		$tgl_start = $thn_dh_1 . "-" . $bln_dh_1 . "-" . $tgl_dh_1 . " " . $this->input->post("time_start");


		$tgl_dh_2 = substr($this->input->post("tgl_end"), 3, 2);
		$bln_dh_2 = substr($this->input->post("tgl_end"), 0, 2);
		$thn_dh_2 = substr($this->input->post("tgl_end"), 6, 4);
		$tgl_end = $thn_dh_2 . "-" . $bln_dh_2 . "-" . $tgl_dh_2 . " " . $this->input->post("time_end");


		//validasi dan pesan error

		// jika waktu kurang
		$unix_now = strtotime("now");

		$unix_tgl_start = strtotime($tgl_start);
		$unix_tgl_end = strtotime($tgl_end);

		$jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) ) ee WHERE status <> 2 AND idm <>" . $idm);

		$jedah_res = $jedah->row_array();

		$keterangan = $this->input->post("keterangan");
		$ruangan = 'Zoom';

		if ($keterangan == 1) {
			$ruangan = $this->input->post("ruangan");
		}

		if ($unix_now > $unix_tgl_start || $unix_now > $unix_tgl_end || $unix_tgl_start > $unix_tgl_end) {
			$hasil['point'] = 'lewat';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else if ($jedah_res['jumlah'] > 1) {
			$hasil['point'] = 'block';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else {
			$data = array(
				'perihal' => $this->input->post("perihal"),
				'tgl_start' => $tgl_start,
				'tgl_end' => $tgl_end,
				'oleh' => $_SESSION['nip'],
				'status' => 0,
				'jumlah_peserta' => $this->input->post("jumlah_peserta"),
				'tgl_pengajuan' => date("Y-m-d"),
				'namapengusul' => $_SESSION['nama'],
				'keterangan' => $keterangan,
				'ruangan' => $ruangan

			);
			$this->db->where('idm', $idm);
			$this->db->update('meetingreq', $data);

			$hasil['point'] = 'sukses';
		}


		return $hasil;
	}




	public function addorderadmin()
	{

		$tgl_dh_1 = substr($this->input->post("tgl_start"), 3, 2);
		$bln_dh_1 = substr($this->input->post("tgl_start"), 0, 2);
		$thn_dh_1 = substr($this->input->post("tgl_start"), 6, 4);
		$tgl_start = $thn_dh_1 . "-" . $bln_dh_1 . "-" . $tgl_dh_1 . " " . $this->input->post("time_start");


		$tgl_dh_2 = substr($this->input->post("tgl_end"), 3, 2);
		$bln_dh_2 = substr($this->input->post("tgl_end"), 0, 2);
		$thn_dh_2 = substr($this->input->post("tgl_end"), 6, 4);
		$tgl_end = $thn_dh_2 . "-" . $bln_dh_2 . "-" . $tgl_dh_2 . " " . $this->input->post("time_end");


		//validasi dan pesan error

		// jika waktu kurang
		$unix_now = strtotime("now");

		$unix_tgl_start = strtotime($tgl_start);
		$unix_tgl_end = strtotime($tgl_end);

		$jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM meetingreq WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) ) ee WHERE status <> 2");

		$jedah_res = $jedah->row_array();

		if ($unix_now > $unix_tgl_start || $unix_now > $unix_tgl_end || $unix_tgl_start > $unix_tgl_end) {
			$hasil['point'] = 'lewat';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else if ($jedah_res['jumlah'] > 1) {
			$hasil['point'] = 'block';
			$hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " Pukul " . $this->input->post("time_start") . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2 . " Pukul " . $this->input->post("time_end");
		} else {
			$data = array(
				'perihal' => $this->input->post("perihal"),
				'tgl_start' => $tgl_start,
				'tgl_end' => $tgl_end,
				'oleh' => $_SESSION['nip'],
				'status' => 1,
				'jumlah_peserta' => $this->input->post("jumlah_peserta"),
				'tgl_pengajuan' => date("Y-m-d"),
				'namapengusul' => $_SESSION['nama'],
				'reply' => $this->input->post("reply"),
				'tgl_approve' => date("Y-m-d"),
				'nip_approve' => $_SESSION['nip'],
				'nama_approve' => $_SESSION['nama']

			);
			$this->db->insert('meetingreq', $data);
			$hasil['point'] = 'sukses';
		}


		return $hasil;
	}



	public function list_order($nip)
	{
		$data = array();
		$i = 0;

		$Q = $this->db->query("SELECT * FROM meetingreq WHERE oleh = " . $nip . " ORDER BY idm DESC");


		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;


				$tgl_dh_1 = substr($data[$i]['tgl_start'], 8, 2);
				$bln_dh_1 = $this->nama_bulan(substr($data[$i]['tgl_start'], 5, 2));
				$thn_dh_1 = substr($data[$i]['tgl_start'], 0, 4);
				$timed = substr($data[$i]['tgl_start'], 11, 8);


				$tgl_dh_2 = substr($data[$i]['tgl_end'], 8, 2);
				$bln_dh_2 = $this->nama_bulan(substr($data[$i]['tgl_end'], 5, 2));
				$thn_dh_2 = substr($data[$i]['tgl_end'], 0, 4);
				$timed2 = substr($data[$i]['tgl_end'], 11, 8);


				$data[$i]['jadwal_awal'] = $tgl_dh_1 . " " . $bln_dh_1 . " " . $thn_dh_1 . " Pukul " . $timed;
				$data[$i]['jadwal_akhir'] = $tgl_dh_2 . " " . $bln_dh_2 . " " . $thn_dh_2 . " Pukul " . $timed2;


				$i++;
			}
		}

		$Q->free_result();
		return $data;
	}




	public function list_order_upload($nip)
	{
		$data = array();
		$i = 0;

		$Q = $this->db->query("SELECT * FROM meetingreq WHERE UNIX_TIMESTAMP(tgl_end) < UNIX_TIMESTAMP(now()) AND status = 1 ORDER BY idm DESC");


		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;


				$tgl_dh_1 = substr($data[$i]['tgl_start'], 8, 2);
				$bln_dh_1 = $this->nama_bulan(substr($data[$i]['tgl_start'], 5, 2));
				$thn_dh_1 = substr($data[$i]['tgl_start'], 0, 4);
				$timed = substr($data[$i]['tgl_start'], 11, 8);


				$tgl_dh_2 = substr($data[$i]['tgl_end'], 8, 2);
				$bln_dh_2 = $this->nama_bulan(substr($data[$i]['tgl_end'], 5, 2));
				$thn_dh_2 = substr($data[$i]['tgl_end'], 0, 4);
				$timed2 = substr($data[$i]['tgl_end'], 11, 8);


				$data[$i]['jadwal_awal'] = $tgl_dh_1 . " " . $bln_dh_1 . " " . $thn_dh_1 . " Pukul " . $timed;
				$data[$i]['jadwal_akhir'] = $tgl_dh_2 . " " . $bln_dh_2 . " " . $thn_dh_2 . " Pukul " . $timed2;


				$i++;
			}
		}

		$Q->free_result();
		return $data;
	}




	public function upload_notulen($nama_file, $idm)
	{
		$data = array(
			'notulen' => $nama_file
		);

		$this->db->where('idm', $idm);
		$this->db->update('meetingreq', $data);
	}


	public function even()
	{
		$data = array();
		$Q = $this->db->query("SELECT * FROM meetingreq WHERE tgl_start > CURRENT_DATE() AND status <> 2");
		$i = 0;

		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;

				if ($data[$i]['status'] == 0) {
					$statuse = "badge badge-danger";
				} else {
					$statuse = "badge badge-success";
				}


				$tgl_dh_1 = substr($data[$i]['tgl_start'], 8, 2);
				$bln_dh_1 = substr($data[$i]['tgl_start'], 5, 2);
				$thn_dh_1 = substr($data[$i]['tgl_start'], 0, 4);
				$timed = substr($data[$i]['tgl_start'], 11, 8);


				$tgl_dh_2 = substr($data[$i]['tgl_end'], 8, 2);
				$bln_dh_2 = substr($data[$i]['tgl_end'], 5, 2);
				$thn_dh_2 = substr($data[$i]['tgl_end'], 0, 4);
				$timed2 = substr($data[$i]['tgl_end'], 11, 8);



				$dataxx[$i]['title'] = $data[$i]['perihal'];
				$dataxx[$i]['start'] = $thn_dh_1 . '-' . $bln_dh_1 . '-' . $tgl_dh_1 . 'T' . $timed;
				$dataxx[$i]['end'] = $thn_dh_2 . '-' . $bln_dh_2 . '-' . $tgl_dh_2 . 'T' . $timed2;

				$dataxx[$i]['className'] = $statuse;

				if ($data[$i]['oleh'] == $_SESSION['nip']) {
					$dataxx[$i]['url'] = base_url('zoom/zoomorder/lookzoom/' . $data[$i]['idm']);
				} else {
					$dataxx[$i]['url'] = "#";
				}




				$i++;
			}
		}
		$Q->free_result();
		return $dataxx;
	}





	//admin

	public function top_bar()
	{
		$data = array();

		$P = $this->db->query("SELECT * FROM userapp WHERE nip = " . $_SESSION['nip']);
		$res_admin = $P->row_array();
		return $res_admin;
	}






	public function list_order_permintaan($status)
	{
		$data = array();
		$i = 0;

		$Q = $this->db->query("SELECT * FROM meetingreq WHERE status = " . $status . " ORDER BY idm DESC");


		if ($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
				$data[] = $row;


				$tgl_dh_1 = substr($data[$i]['tgl_start'], 8, 2);
				$bln_dh_1 = $this->nama_bulan(substr($data[$i]['tgl_start'], 5, 2));
				$thn_dh_1 = substr($data[$i]['tgl_start'], 0, 4);
				$timed = substr($data[$i]['tgl_start'], 11, 8);


				$tgl_dh_2 = substr($data[$i]['tgl_end'], 8, 2);
				$bln_dh_2 = $this->nama_bulan(substr($data[$i]['tgl_end'], 5, 2));
				$thn_dh_2 = substr($data[$i]['tgl_end'], 0, 4);
				$timed2 = substr($data[$i]['tgl_end'], 11, 8);


				$tgl_dh_3 = substr($data[$i]['tgl_approve'], 8, 2);
				$bln_dh_3 = $this->nama_bulan(substr($data[$i]['tgl_approve'], 5, 2));
				$thn_dh_3 = substr($data[$i]['tgl_approve'], 0, 4);


				$tgl_dh_4 = substr($data[$i]['tgl_pengajuan'], 8, 2);
				$bln_dh_4 = $this->nama_bulan(substr($data[$i]['tgl_pengajuan'], 5, 2));
				$thn_dh_4 = substr($data[$i]['tgl_pengajuan'], 0, 4);


				$data[$i]['jadwal_awal'] = $tgl_dh_1 . " " . $bln_dh_1 . " " . $thn_dh_1 . " Pukul " . $timed;
				$data[$i]['jadwal_akhir'] = $tgl_dh_2 . " " . $bln_dh_2 . " " . $thn_dh_2 . " Pukul " . $timed2;
				$data[$i]['tgl_approve_ok'] = $tgl_dh_3 . " " . $bln_dh_3 . " " . $thn_dh_3;
				$data[$i]['tgl_pengajuan_ok'] = $tgl_dh_4 . " " . $bln_dh_4 . " " . $thn_dh_4;

				$i++;
			}
		}

		$Q->free_result();
		return $data;
	}



	public function permintaan_data($idm)
	{
		$data = array();
		$Q = $this->db->query("SELECT * FROM meetingreq WHERE idm = " . $idm);
		if ($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;
	}

	public function editzoom($idm)
	{
		$data = array();
		$Q = $this->db->query("SELECT * FROM meetingreq WHERE status = 0 AND oleh = " . $_SESSION['nip'] . " AND idm = " . $idm);
		if ($Q->num_rows() > 0) {
			$data = $Q->row_array();

			$tgl_dh_1 = substr($data['tgl_start'], 8, 2);
			$bln_dh_1 = substr($data['tgl_start'], 5, 2);
			$thn_dh_1 = substr($data['tgl_start'], 0, 4);

			$data['tgl_start_time'] = substr($data['tgl_start'], 11, 5);


			$tgl_dh_2 = substr($data['tgl_end'], 8, 2);
			$bln_dh_2 = substr($data['tgl_end'], 5, 2);
			$thn_dh_2 = substr($data['tgl_end'], 0, 4);

			$data['tgl_end_time'] = substr($data['tgl_end'], 11, 5);


			$data['tgl_start_tgl'] = $bln_dh_1 . '/' . $tgl_dh_1 . '/' . $thn_dh_1;
			$data['tgl_end_tgl'] = $bln_dh_2 . '/' . $tgl_dh_2 . '/' . $thn_dh_2;
		} else {
			$data['idm'] = 0;
		}
		$Q->free_result();
		return $data;
	}


	public function lookzoom($idm)
	{
		$data = array();
		$Q = $this->db->query("SELECT * FROM meetingreq WHERE oleh = " . $_SESSION['nip'] . " AND idm = " . $idm);
		if ($Q->num_rows() > 0) {
			$data = $Q->row_array();

			$tgl_dh_1 = substr($data['tgl_start'], 8, 2);
			$bln_dh_1 = $this->nama_bulan(substr($data['tgl_start'], 5, 2));
			$thn_dh_1 = substr($data['tgl_start'], 0, 4);

			$data['tgl_start_time'] = substr($data['tgl_start'], 11, 5);


			$tgl_dh_2 = substr($data['tgl_end'], 8, 2);
			$bln_dh_2 = $this->nama_bulan(substr($data['tgl_end'], 5, 2));
			$thn_dh_2 = substr($data['tgl_end'], 0, 4);

			$data['tgl_end_time'] = substr($data['tgl_end'], 11, 5);


			$data['tgl_start_tgl'] = $tgl_dh_1 . ' ' . $bln_dh_1 . ' ' . $thn_dh_1;
			$data['tgl_end_tgl'] = $tgl_dh_2 . ' ' . $bln_dh_2 . ' ' . $thn_dh_2;
		} else {
			$data['idm'] = 0;
		}
		$Q->free_result();
		return $data;
	}



	public function update_permintaan($idm)
	{

		$data = array(
			'reply' => $this->input->post("reply"),
			'nip_approve' => $_SESSION['nip'],
			'status' => 1,
			'tgl_approve' => date("Y-m-d"),
			'nama_approve' => $_SESSION['nama']
		);

		$this->db->where('idm', $idm);
		$this->db->update('meetingreq', $data);
	}






	public function hapuszoom($idm)
	{

		$data = array(
			'nip_approve' => $_SESSION['nip'],
			'status' => 2,
			'tgl_approve' => date("Y-m-d"),
			'nama_approve' => $_SESSION['nama']
		);

		$this->db->where('idm', $idm);
		$this->db->update('meetingreq', $data);
	}


	public function nama_bulan($bulan)
	{
		$nama_bulan = "";
		switch ($bulan) {
			case 1:
				$nama_bulan = "januari";
				break;
			case 2:
				$nama_bulan = "februari";
				break;
			case 3:
				$nama_bulan = "maret";
				break;
			case 4:
				$nama_bulan = "april";
				break;
			case 5:
				$nama_bulan = "mei";
				break;
			case 6:
				$nama_bulan = "juni";
				break;
			case 7:
				$nama_bulan = "juli";
				break;
			case 8:
				$nama_bulan = "agustus";
				break;
			case 9:
				$nama_bulan = "september";
				break;
			case 10:
				$nama_bulan = "oktober";
				break;
			case 11:
				$nama_bulan = "november";
				break;
			case 12:
				$nama_bulan = "desember";
				break;
		}
		return $nama_bulan;
	}



	///


	public function cekUserExist($nip, $namaU)
	{
		$data = array();

		$P = $this->db->query("SELECT * FROM pegawai WHERE nip_lama = '" . $nip . "'");
		if ($P->num_rows() == 0) {

			$K = $this->db->query("SELECT * FROM pegawai_kabkota WHERE nip_lama_pegawai_kabkota = '" . $nip . "'");
			if ($K->num_rows() == 0) {
				$data = array(
					'nip_lama_pegawai_kabkota' => $nip,
					'nama_pegawai_kabkota' => $namaU
				);
				$this->db->insert('pegawai_kabkota', $data);
				$kabkota = $this->db->select('*')->from('pegawai_kabkota');
				$kabkota = $this->db->where('nip_lama_pegawai_kabkota',  $nip);

				return $kabkota->get()->result_array();
			} else {
				return $K->result_array();
			}
		} else {
			return $P->result_array();
		}
	}
	// public function cekUserExist($nip, $namaU)
	// {
	// 	$data = array();

	// 	$P = $this->db->query("SELECT * FROM userapp WHERE nip = '" . $nip . "'");
	// 	if ($P->num_rows() == 0) {

	// 		$data = array(
	// 			'nip' => $nip,
	// 			'namaU' => $namaU
	// 		);
	// 		$this->db->insert('userapp', $data);

	// 		return $this->db->where('nip', $nip)->get()->result_array();
	// 	} else {
	// 		return $P->result_array();
	// 	}
	// }



	public function list_tahun($id_zperiode)
	{
		$data = array();
		$i = 0;

		if ($id_zperiode == 0) {

			$A = $this->db->query("SELECT * FROM z_periode where aktif=1 ");


			// untuk menampilkan data tabel yang sedikit gunakan if row seperti ini
			// nama variabel ($) tahunaktif buat sendiri

			if ($A->num_rows() > 0) {
				$tahunaktif = $A->row_array();
				$id_zperiode = $tahunaktif['id_zperiode'];
			}
			$A->free_result();
		}
		// gak perlu tambah WHERE jika hanya ingin menampilkan  isi data  sekaligus
		//kalau ngepict data tertentu kemungkinan membutuhkan kondisi sperti WHERE



		$P = $this->db->query("SELECT * FROM z_periode ORDER BY tahun DESC");


		if ($P->num_rows() > 0) {
			foreach ($P->result_array() as $row) {
				$data[] = $row;
				if ($data[$i]['id_zperiode'] == $id_zperiode) {
					$data[$i]['status'] = 'active';
				} else {
					$data[$i]['status'] = ' ';
				}
				$i++;
			}
		}
		return $data;
	}

	public function list_teamkerja($nip, $id_zperiode)
	{
		$data = array();
		$i = 0;
		// ketika menampilkan menu default sebelum mengklik tahun

		if ($id_zperiode == 0) {

			$A = $this->db->query("SELECT * FROM z_periode where aktif=1 ");


			// untuk menampilkan data tabel yang sedikit gunakan if row seperti ini
			// nama variabel ($) tahunaktif buat sendiri

			if ($A->num_rows() > 0) {
				$tahunaktif = $A->row_array();
				$id_zperiode = $tahunaktif['id_zperiode'];
			}
			$A->free_result();
		}


		$P = $this->db->query("SELECT * FROM z_team T, z_anggotateam A, userapp U, z_periode P WHERE P.id_zperiode = T.id_zperiode AND T.id_zteam = A.id_team AND U.ida = A.id_user AND P.id_zperiode = " . $id_zperiode . " AND U.nip = " . $nip);

		// untuk menampilkan data tabel yang banyak gunakan if row seperti ini. tapi,
		//data yg banyak itu bukan hanya sebatas baris/row nya banyak, tapi banyak anunya? 
		if ($P->num_rows() > 0) {
			foreach ($P->result_array() as $row) {
				$data[] = $row;
			}
		}


		return $data;
	}






	public function list_rapat_upload($nip, $id_zteam)
	{
		$data = array();
		$i = 0;

		// perintah join hanya memuat tabel yang saling berhubungan disini hanya tabel z_team dan rapatteam begitu juga di atas. setelah membuat perintah select SQL, selalu cek apakah select itu berjalan. caranya copas ini ke bagian SQL di phpmyadmin dan bagian yang ada variabelnya di isi dengan value nya. misal SELECT * FROM z_team T, rapatteam R WHERE T.id_zteam = R.id_zteam AND T.id_zteam = "11"

		$A = $this->db->query("SELECT * FROM z_team T, rapatteam R WHERE T.id_zteam = R.id_zteam AND T.id_zteam = " . $id_zteam);

		if ($A->num_rows() > 0) {
			$datateam = $A->row_array();
			$id_zteam = $datateam['id_zteam'];

			foreach ($A->result_array() as $row) {
				$data[] = $row;

				$tgl_dh_1 = substr($data[$i]['mulai_rapat'], 8, 2);
				$bln_dh_1 = $this->nama_bulan(substr($data[$i]['mulai_rapat'], 5, 2));
				$thn_dh_1 = substr($data[$i]['mulai_rapat'], 0, 4);
				$timed = substr($data[$i]['mulai_rapat'], 11, 8);

				$tgl_dh_2 = substr($data[$i]['akhir_rapat'], 8, 2);
				$bln_dh_2 = $this->nama_bulan(substr($data[$i]['akhir_rapat'], 5, 2));
				$thn_dh_2 = substr($data[$i]['akhir_rapat'], 0, 4);
				$timed2 = substr($data[$i]['akhir_rapat'], 11, 8);

				$data[$i]['jadwal_awal'] = $tgl_dh_1 . " " . $bln_dh_1 . " " . $thn_dh_1 . " Pukul " . $timed;
				$data[$i]['jadwal_akhir'] = $tgl_dh_2 . " " . $bln_dh_2 . " " . $thn_dh_2 . " Pukul " . $timed2;

				$i++;
			}
		}



		$A->free_result();

		return $data;
	}


	public function upload_notulen_rapat($nama_file, $idr)
	{
		$data = array(
			'notulen' => $nama_file
		);

		$this->db->where('idr', $idr);
		$this->db->update('rapatteam', $data);
	}
}
