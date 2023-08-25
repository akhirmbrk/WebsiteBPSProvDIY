<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpd extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	function format_date_now (){
        $data = array();
		$tanggalin = date("Y-m-d");
        $bulan = substr($tanggalin, 5, 2); // bulan
        $tahun = substr($tanggalin, 2, 2); // tahun
		$tgl = substr($tanggalin, 8, 2);
		
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
		
        return $tgl." ".$nama_bulan." ".$tahun;
    }	
	
	
	function format_date_oke ($tanggalin){
        $data = array();
		
        $bulan = substr($tanggalin, 5, 2); // bulan
        $tahun = substr($tanggalin, 0, 4); // tahun
		$tgl = substr($tanggalin, 8, 2);
		
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
		
        return $tgl." ".$nama_bulan." ".$tahun;
    }	
	
	
	public function nama_bulan($bulan) {	
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
	
	public function nama_bulan_twodigit($bulan) {	
		$nama_bulan = "";
		switch ($bulan) {
			case "01":
				$nama_bulan = "Jan";
				break;
			case "02":
				$nama_bulan = "Feb";
				break;
			case "03":
				$nama_bulan = "Mar";
				break;
			case "04":
				$nama_bulan = "Apr";
				break;
			case "05":
				$nama_bulan = "Mei";
				break;
			case "06":
				$nama_bulan = "Jun";
				break;
			case "07":
				$nama_bulan = "Jul";
				break;
			case "08":
				$nama_bulan = "Ags";
				break;
			case "09":
				$nama_bulan = "Sep";
				break;
			case "10":
				$nama_bulan = "Okt";
				break;
			case "11":
				$nama_bulan = "Nov";
				break;
			case "12":
				$nama_bulan = "Des";
				break;
		}
        return $nama_bulan;	
	}
	
	
	private function format_tanggal_dua($tanggalin){
        $data = array();
        $bulan = substr($tanggalin, 5, 2); // bulan
        $tahun = substr($tanggalin, 2, 2); // tahun
		$tgl = substr($tanggalin, 8, 2);
		$pukul = substr($tanggalin, 11, 5);
		
		$nama_bulan = "";
		switch ($bulan) {
			case "01":
				$nama_bulan = "Jan";
				break;
			case "02":
				$nama_bulan = "Feb";
				break;
			case "03":
				$nama_bulan = "Mar";
				break;
			case "04":
				$nama_bulan = "Apr";
				break;
			case "05":
				$nama_bulan = "Mei";
				break;
			case "06":
				$nama_bulan = "Jun";
				break;
			case "07":
				$nama_bulan = "Jul";
				break;
			case "08":
				$nama_bulan = "Ags";
				break;
			case "09":
				$nama_bulan = "Sep";
				break;
			case "10":
				$nama_bulan = "Okt";
				break;
			case "11":
				$nama_bulan = "Nov";
				break;
			case "12":
				$nama_bulan = "Des";
				break;
		}	
		
        return $tgl." ".$nama_bulan;
    }	
	
	
	function rupiah_des($angka){
		$hasil_rupiah = number_format($angka,0,'','.');
		return $hasil_rupiah; 
	}



	
	public function add_mpd(){		
		$data = array(
			'uraian' => $this->input->post("uraian"),
			'jumlah' => $this->input->post("jumlah"),
			'arsip' => '1'
			
		);
        $this->db->insert('mpd_tabel', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	
	
	public function edit_mpd(){		
		$data = array(
			'uraian' => $this->input->post("uraian"),
			'jumlah' => $this->input->post("jumlah")
			
		);
		
		$this->db->where('id_mpd',$this->input->post("id_mpd"));
        $this->db->update('mpd_tabel', $data);
		
		
		$insert_id = $this->input->post("id_mpd");
		return  $insert_id;
	}
	
	
	
	
	public function definisi_step($step){
      
		switch ($step) {
			case "1":
				$nama_step = "Pengajuan Form Permintaan";
				break;
			case "2":
				$nama_step = "Penyusunan SPJ";
				break;
			case "3":
				$nama_step = "Pembuatan Surat Permintaan Pembayaran";
				break;
			case "4":
				$nama_step = "Pengajuan Surat Perintah Membayar";
				break;
			case "5":
				$nama_step = "Penerbitan Surat Perintah Pencairan Dana";
				break;
			
		}	
		
        return $nama_step;
    }	
	
	
	public function list_mpd() {
		$data = array();
		$i=0;
		$Q = $this->db->query("SELECT * FROM mpd_tabel WHERE arsip = 1  ORDER BY tahap_aktif_date DESC ");		
		
		
		
		if($Q->num_rows() > 0) {
			foreach ($Q->result_array() as $row) {
                $data[] = $row;	


				
				$data[$i]['jumlah'] = $this->rupiah_des($data[$i]['jumlah']);
				//$data[$i]['tanggal_lh'] = $this->format_tanggal_lap($data[$i]['tanggal_added']);
				$data[$i]['tahap1_date_'] = $this->format_tanggal_dua($data[$i]['tahap1_date']);
				$data[$i]['tahap2_date_'] = $this->format_tanggal_dua($data[$i]['tahap2_date']);
				$data[$i]['tahap3_date_'] = $this->format_tanggal_dua($data[$i]['tahap3_date']);
				$data[$i]['tahap4_date_'] = $this->format_tanggal_dua($data[$i]['tahap4_date']);
				$data[$i]['tahap5_date_'] = $this->format_tanggal_dua($data[$i]['tahap5_date']);
				$i++;
		   }
        }
		
		
		
        $Q->free_result();
        return $data;
    }
			
	
	public function data_mpd($id_mpd) {
		$data = array();
		$Q = $this->db->query("SELECT * FROM mpd_tabel MP WHERE MP.id_mpd = ".$id_mpd);		
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
			$data['tahap1_date_'] = $this->format_date_oke($data['tahap1_date']);
			$data['tahap2_date_'] = $this->format_date_oke($data['tahap2_date']);
			$data['tahap3_date_'] = $this->format_date_oke($data['tahap3_date']);
			$data['tahap4_date_'] = $this->format_date_oke($data['tahap4_date']);
			$data['tahap5_date_'] = $this->format_date_oke($data['tahap5_date']);
			
        }
        $Q->free_result();
        return $data;
    }
	
	
	
	public function upload_proses($nama_file,$id_mpd,$tahap){	
	
		/* switch ($tahap) {
			case "1":
				
				$data = array(
					'tahap1_link' => $this->input->post("uraian"),
					'tahap1_idpic' => $this->input->post("jumlah"),
					'tahap1_date' => '1',
					'tahap_aktif_link' => $this->input->post("uraian"),
					'tahap_aktif_idpic' => $this->input->post("uraian"),
					'tahap_aktif_date' => $this->input->post("jumlah"),
					'tahap_aktif' => '1'
					
				);
				
				
				break;
			case "2":
				
				
				
				
				break;
			case "3":
				
				
				
				
				break;
			case "4":
				
				
				
				
				break;
			case "5":
				
				
				
				
				break;
		
		} */
		
		
		$data = array(
					'tahap'.$tahap.'_link' => $nama_file,
					'tahap'.$tahap.'_idpic' => $_SESSION['nama_peg'],
					'tahap'.$tahap.'_date' =>  date("Y-m-d"),
					'tahap_aktif_link' => $nama_file,
					'tahap_aktif_idpic' => $_SESSION['nama_peg'],
					'tahap_aktif_date' =>  date("Y-m-d"),
					'tahap_aktif' => $tahap
					
				);

	    $this->db->where('id_mpd',$id_mpd );
        $this->db->update('mpd_tabel', $data);
	}
	
	
	
	
	
	
	
}