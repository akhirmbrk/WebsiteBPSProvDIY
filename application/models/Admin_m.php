<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
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
				$nama_bulan = "januari";
				break;
			case "02":
				$nama_bulan = "februari";
				break;
			case "03":
				$nama_bulan = "maret";
				break;
			case "04":
				$nama_bulan = "april";
				break;
			case "05":
				$nama_bulan = "mei";
				break;
			case "06":
				$nama_bulan = "juni";
				break;
			case "07":
				$nama_bulan = "juli";
				break;
			case "08":
				$nama_bulan = "agustus";
				break;
			case "09":
				$nama_bulan = "september";
				break;
			case "10":
				$nama_bulan = "oktober";
				break;
			case "11":
				$nama_bulan = "november";
				break;
			case "12":
				$nama_bulan = "desember";
				break;
		}
        return $nama_bulan;	
	}
	
	
	public function list_pekerjaan_tulis($level) {
		$data = array();
		if($level!=10) {
			$Q = $this->db->query("SELECT * FROM m_pekerjaan MP, m_satker MS, pegawai P WHERE MS.id_satker = MP.id_satker AND MS.group_eselon_tiga = ".$level." AND diusulkan !=0 AND diusulkan = P.id_pegawai AND MP.status_pekerjaan = 1 ");		
		}else {
			$Q = $this->db->query("SELECT * FROM m_pekerjaan MP, m_satker MS, pegawai P WHERE MS.id_satker = MP.id_satker AND diusulkan !=0 AND diusulkan = P.id_pegawai AND MP.status_pekerjaan = 1 ");		
		}
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;				
            }
        }
        $Q->free_result();
        return $data;
    }
	
	public function pekerjaan_tulis($id_pekerjaan) {
		$data = array();
		$Q = $this->db->query("SELECT * FROM m_pekerjaan MP WHERE MP.id_pekerjaan = ".$id_pekerjaan);		
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }
	
	public function pekerjaan_satker($id_satker) {
		$data = array();
		$i=0;
		$Q = $this->db->query("SELECT * FROM m_satker");		
		if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['id_satker']==$id_satker){
					 $data[$i]['selected'] = "selected";
				}else{
					 $data[$i]['selected'] = "";
				}	
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }
	public function pekerjaan_penilai($id_m_jbtn_penilai) {
		$data = array();
		$i=0;				   
		$Q = $this->db->query("SELECT * FROM m_jabatan MJ, m_satker MS WHERE MS.id_satker = MJ.id_satker_jabatan AND MJ.id_eselon_jabatan < 5");		
		if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['id_m_jabatan']==$id_m_jbtn_penilai){
					 $data[$i]['selected'] = "selected";
				}else{
					 $data[$i]['selected'] = "";
				}	
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }	

	public function list_pekerjaan($bidang) {
		$data = array();

		if($bidang==2) {
			$Q = $this->db->query("SELECT * FROM m_pekerjaan MP, m_satker MS WHERE MS.id_satker = MP.id_satker AND MP.status_pekerjaan = 1 AND (MS.group_eselon_tiga = 2 OR MS.group_eselon_tiga = 0)");	
		} else {
			$Q = $this->db->query("SELECT * FROM m_pekerjaan MP, m_satker MS WHERE MS.id_satker = MP.id_satker AND MP.status_pekerjaan = 1 AND MS.group_eselon_tiga = ".$bidang);		
		}
		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;				
            }
        }
        $Q->free_result();
        return $data;
    }
	public function list_transfer_pekerjaan($id_satker) {
		$data = array();
		$Q = $this->db->query("SELECT * FROM m_pekerjaan MP WHERE status_pekerjaan = 1 AND diusulkan = 0 AND id_satker = ".$id_satker);		

        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;				
            }
        }
        $Q->free_result();
        return $data;
    }
	
	
	
	public function list_pekerjaan_nk($bidang) {
		$data = array();
		if($bidang==10) {
			$Q = $this->db->query("SELECT * FROM m_satker MS, m_pekerjaan MP LEFT JOIN pegawai P ON MP.diusulkan=P.id_pegawai WHERE MS.id_satker = MP.id_satker AND MP.status_pekerjaan = 0");		
		}else {
			$Q = $this->db->query("SELECT * FROM m_satker MS, m_pekerjaan MP LEFT JOIN pegawai P ON MP.diusulkan=P.id_pegawai WHERE MS.id_satker = MP.id_satker AND MP.status_pekerjaan = 0 AND MS.group_eselon_tiga = ".$bidang);	
		}
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;				
            }
        }
        $Q->free_result();
        return $data;
    }
	
	public function edit_master_pekerjeaan($id_pekerjaan){		
		$data = array(
			'nama' => $this->input->post("nama"),
			'satuan' => $this->input->post("satuan"),
			'id_satker' => $this->input->post("id_satker"),
			'id_m_jbtn_penilai' => $this->input->post("id_m_jbtn_penilai")
		);
		
	    $this->db->where('id_pekerjaan',$id_pekerjaan );
        $this->db->update('m_pekerjaan', $data);
	}

	public function tambah_master_pekerjeaan(){		
		$id_satker_ex=$this->input->post("id_satker");
		if($id_satker_ex==1||$id_satker_ex==2||($id_satker_ex>20&&$id_satker_ex<26)){
			$fungsional=2;
		}else{
			$fungsional=1;
		}
		
		$data = array(
			'nama' => $this->input->post("nama"),
			'satuan' => $this->input->post("satuan"),
			'status_pekerjaan' => 1,
			'id_satker' => $id_satker_ex,
			'fungsional_tipe' => $fungsional,
			'diusulkan' => 0,
			'id_m_jbtn_penilai' => $this->input->post("id_m_jbtn_penilai")
		);	
		$this->db->insert('m_pekerjaan', $data);
	}
	
	
	public function transfer_master_pekerjeaan($id_pekerjaan_lama){		
		$data = array(
			'status_pekerjaan' => 9
		);
	    $this->db->where('id_pekerjaan',$id_pekerjaan_lama);
        $this->db->update('m_pekerjaan', $data);
		
		$data_transfer = array(
			'id_pekerjaan' => $this->input->post("id_pekerjaan_transfer")
		);
	    $this->db->where('id_pekerjaan',$id_pekerjaan_lama);
        $this->db->update('transaksi_kerja', $data_transfer);
		
	}
	
	public function list_tahun($tahun) {
		$data = array();
		$i=0;
		$Q = $this->db->query("SELECT DISTINCT tahun_dh AS thn FROM dhline");		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['thn']==$tahun){
					 $data[$i]['selected'] = "selected";
				}else{
					 $data[$i]['selected'] = "";
				}
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }

	public function list_deadline($tahun) {
		$data = array();
		$i=0;
		$Q = $this->db->query("SELECT * FROM dhline WHERE tahun_dh =".$tahun);		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				$data[$i]['nama_bulan']=$this->nama_bulan($data[$i]['bln_ckp_dh']);	
				
				$bln_dh=$this->nama_bulan_twodigit(substr($data[$i]['tanggal_dh'],5, 2));
				$tgl_dh=substr($data[$i]['tanggal_dh'],8, 2);
				$thn_dh=substr($data[$i]['tanggal_dh'],0, 4);			
				$data[$i]['tanggal_dh_human']=$tgl_dh." ".$bln_dh." ".$thn_dh;
				
				$bln_dh_n=$this->nama_bulan_twodigit(substr($data[$i]['tanggal_dh_nilai'],5, 2));
				$tgl_dh_n=substr($data[$i]['tanggal_dh_nilai'],8, 2);
				$thn_dh_n=substr($data[$i]['tanggal_dh_nilai'],0, 4);			
				$data[$i]['tanggal_dh_nilai_human']=$tgl_dh_n." ".$bln_dh_n." ".$thn_dh_n;
				
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }
	
	public function deadline_info($id_dealine) {
		$data = array();
		$Q = $this->db->query("SELECT * FROM dhline WHERE id_dhline = ".$id_dealine);		
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
			$data['bln_ckp_dh_nama']=$this->nama_bulan($data['bln_ckp_dh']);
			
			$tgl_dh_1=substr($data['tanggal_dh'],8, 2);
			$bln_dh_1=substr($data['tanggal_dh'],5, 2);
			$thn_dh_1=substr($data['tanggal_dh'],0, 4);	
			$data['tanggal_dh_edit']= $bln_dh_1.'/'.$tgl_dh_1.'/'.$thn_dh_1;			
			
			$tgl_dh_2=substr($data['tanggal_dh_nilai'],8, 2);
			$bln_dh_2=substr($data['tanggal_dh_nilai'],5, 2);
			$thn_dh_2=substr($data['tanggal_dh_nilai'],0, 4);	
			$data['tanggal_dh_nilai_edit']= $bln_dh_2.'/'.$tgl_dh_2.'/'.$thn_dh_2;	
        }
        $Q->free_result();
        return $data;
    }
	
	public function edit_deadline($id_dealine){		
		$tgl_dh_1=substr($this->input->post("tanggal_dh"),3, 2);
		$bln_dh_1=substr($this->input->post("tanggal_dh"),0, 2);
		$thn_dh_1=substr($this->input->post("tanggal_dh"),6, 4);
		$tanggal_dh = $thn_dh_1."-".$bln_dh_1."-".$tgl_dh_1." 23:59:59";
		
		$tgl_dh_2=substr($this->input->post("tanggal_dh_nilai"),3, 2);
		$bln_dh_2=substr($this->input->post("tanggal_dh_nilai"),0, 2);
		$thn_dh_2=substr($this->input->post("tanggal_dh_nilai"),6, 4);
		$tanggal_dh_nilai = $thn_dh_2."-".$bln_dh_2."-".$tgl_dh_2." 23:59:59";
	
		$data = array(
			'tanggal_dh' => $tanggal_dh,
			'tanggal_dh_nilai' => $tanggal_dh_nilai
		);
		
	    $this->db->where('id_dhline',$id_dealine );
        $this->db->update('dhline', $data);
	}
	
	public function list_pegawai_all($id_pegawai,$level){
        $data = array();
		$i=0;
		
		if($level==10) {
			$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE MS.id_satker = PJ.id_satker_jabatan AND PJ.status_peg = 1  ORDER BY PJ.id_eselon_jabatan, MS.id_satker ASC");	
		}else {
			$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE MS.id_satker = PJ.id_satker_jabatan AND PJ.status_peg = 1 AND MS.group_eselon_tiga = ".$level." ORDER BY PJ.id_eselon_jabatan, MS.id_satker ASC");
		}
		
		if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['id_pegawai']==$id_pegawai){
					 $data[$i]['selected'] = "selected";
				}else{
					 $data[$i]['selected'] = "";
				}	
				$i++;
            }
        }
		
        $Q->free_result();
        return $data;
    }
	
	
	
	public function list_pegawai($bidang){
        $data = array();
		
		if($bidang==2) {
			$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE MS.id_satker = PJ.id_satker_jabatan AND PJ.status_peg = 1 AND (MS.group_eselon_tiga=2 OR MS.group_eselon_tiga=0) ORDER BY PJ.id_eselon_jabatan, MS.id_satker ASC");	
		} else {
			$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE MS.id_satker = PJ.id_satker_jabatan AND PJ.status_peg = 1 AND MS.group_eselon_tiga=".$bidang." ORDER BY PJ.id_eselon_jabatan, MS.id_satker ASC");	
		}

		
        if($Q->num_rows() > 0) {
            $data = $Q->result_array();
        }
        $Q->free_result();
        return $data;
    }
	
	public function list_pegawai_nonaktif(){
        $data = array();
		$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE MS.id_satker = PJ.id_satker_jabatan AND PJ.status_peg = 0 ORDER BY PJ.id_eselon_jabatan, MS.id_satker ASC");	

        if($Q->num_rows() > 0) {
            $data = $Q->result_array();
        }
        $Q->free_result();
        return $data;
    }
	
	public function pegawai_info($id_pegawai) {
		$data = array();
		$Q = $this->db->query("SELECT * FROM pegawai_jabatan PJ, m_satker MS WHERE PJ.id_satker_jabatan = MS.id_satker AND id_pegawai = ".$id_pegawai);		
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }
	public function edit_master_pegawai($id_pegawai){		
		$data = array(
			'nama_peg' => $this->input->post("nama_peg"),
			'nip' => $this->input->post("nip"),
			'gol' => $this->input->post("gol"),
			'pangkat' => $this->input->post("pangkat"),
			'id_m_jabatan' => $this->input->post("id_m_jabatan")
		);
		
	    $this->db->where('id_pegawai',$id_pegawai );
        $this->db->update('pegawai', $data);
	}	
	public function edit_setting_akun_pegawai($id_pegawai){		
		$data = array(
			'usenama' => $this->input->post("usenama"),
			'paswod' => md5($this->input->post("paswodbaru1"))
		);
		
	    $this->db->where('id_pegawai',$id_pegawai );
        $this->db->update('pegawai', $data);
	}		
	
	public function add_master_pegawai(){		
		$data = array(
			'nama_peg' => $this->input->post("nama_peg"),
			'nip' => $this->input->post("nip"),
			'gol' => $this->input->post("gol"),
			'pangkat' => $this->input->post("pangkat"),
			'level_user' => 0,
			'usenama' => $this->input->post("usenama"),
			'paswod' => md5($this->input->post("paswod")),
			'status_peg' => 1,
			'id_m_jabatan' => $this->input->post("id_m_jabatan")
			
		);
        $this->db->insert('pegawai', $data);
	}
	
	
	
	public function usenama_check_new ($str){
        $data = array();
        $Q = $this->db->query("SELECT * FROM pegawai WHERE usenama= '".$str."'");		
        if($Q->num_rows() > 0) {
           $datahasil= FALSE;
        }else{
			$datahasil= TRUE;
		}
        $Q->free_result();		
        return $datahasil;
    }
	
	
	public function all_jabatan($id_m_jabatan) {
		$data = array();
		$i=0;
		$Q = $this->db->query("SELECT * FROM m_jabatan MJ, m_satker MS WHERE MS.id_satker = MJ.id_satker_jabatan ");		
		if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['id_m_jabatan']==$id_m_jabatan){
					 $data[$i]['selected'] = "selected";
				}else{
					 $data[$i]['selected'] = "";
				}	
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }	
	
	
	
	
	
	public function list_skp($bidang){
        $data = array();
		
		if($bidang==2) {
			$Q = $this->db->query("SELECT * FROM (SELECT COUNT(*) as jumlah, MJ.id_m_jabatan, nama_jabatan, nama_peg, nama_fungsional, MJ.id_satker_jabatan FROM m_jabatan MJ LEFT JOIN pegawai P ON P.id_m_jabatan = MJ.id_m_jabatan GROUP BY P.id_m_jabatan) ABC, m_satker MSS WHERE MSS.id_satker = ABC.id_satker_jabatan AND ( group_eselon_tiga= 2 OR group_eselon_tiga =0) ORDER BY id_satker");	
		} else {
			$Q = $this->db->query("SELECT * FROM (SELECT COUNT(*) as jumlah, MJ.id_m_jabatan, nama_jabatan, nama_peg, nama_fungsional, MJ.id_satker_jabatan FROM m_jabatan MJ LEFT JOIN pegawai P ON P.id_m_jabatan = MJ.id_m_jabatan GROUP BY P.id_m_jabatan) ABC, m_satker MSS WHERE MSS.id_satker = ABC.id_satker_jabatan AND group_eselon_tiga= ".$bidang." ORDER BY id_satker");	
		}

		
        if($Q->num_rows() > 0) {
            $data = $Q->result_array();
        }
        $Q->free_result();
        return $data;
    }
	
	
	public function list_skp_all($id_m_jabatan){
        $data = array();
		$i=0;
		
		$Q = $this->db->query("SELECT * FROM m_skp MSK, m_pekerjaan MP, m_jabatan MJ, m_satker MSKR WHERE MP.id_pekerjaan = MSK.id_pekerjaan_skp AND MSK.id_m_jabatan_skp = ".$id_m_jabatan." AND MP.id_m_jbtn_penilai = MJ.id_m_jabatan AND MJ.id_satker_jabatan = MSKR.id_satker ORDER BY MSK.bln_ckp_skp");	

        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				$data[$i]['bln_ckp_skp_nama']= $this->nama_bulan($data[$i]['bln_ckp_skp']);	
				$i++;
            }
        }
        $Q->free_result();
        return $data;
    }
	public function jabatan_skp($id_m_jabatan){
        $data = array();
		$Q = $this->db->query("SELECT * FROM m_jabatan MJ, m_satker MS WHERE MS.id_satker = MJ.id_satker_jabatan AND MJ.id_m_jabatan  = ".$id_m_jabatan);
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}	
        $Q->free_result();
        return $data;
    }
	
	public function hapus_skp($id_tk_skp){
	    $this->db->where('id_tk_skp', $id_tk_skp);
        $this->db->delete('m_skp');
	}
	public function skp_info($id_tk_skp){
        $data = array();
		$Q = $this->db->query("SELECT * FROM m_skp MSK, m_jabatan MJ, m_satker MS, m_pekerjaan MP WHERE MS.id_satker = MJ.id_satker_jabatan AND MJ.id_m_jabatan = MSK.id_m_jabatan_skp AND MP.id_pekerjaan=MSK.id_pekerjaan_skp AND MSK.id_tk_skp = ".$id_tk_skp);
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
			$data['bln_ckp_skp_nama']= $this->nama_bulan($data['bln_ckp_skp']);	
		}	
        $Q->free_result();
        return $data;
    }
	public function skp_all_edit_row($id_tk_skp){		
		$data = array(
			'target_skp' => $this->input->post("target_skp")
		);
		
	    $this->db->where('id_tk_skp',$id_tk_skp );
        $this->db->update('m_skp', $data);
	}
	
	
	
	public function skp_add_row($id_m_jabatan){		
		$data = array(
			'id_m_jabatan_skp' => $id_m_jabatan,
			'id_pekerjaan_skp' => $this->input->post("id_pekerjaan_transfer"),
			'target_skp' => $this->input->post("target_skp"),
			'bln_ckp_skp' => $this->input->post("bln_ckp_skp")
			
		);
        $this->db->insert('m_skp', $data);
	}	
	
	
	
	public function penilai_kaprov (){
        $data = array();
		$Q = $this->db->query("SELECT nama_kepala AS nama_peg, nip FROM atasan_kaprov WHERE id_atasan = 1");
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}	
        $Q->free_result();
        return $data;
    }
	public function edit_penilai_kaprov(){		
		$data = array(
			'nama_kepala' => $this->input->post("nama_peg"),
			'nip' => $this->input->post("nip")
		);
		
	    $this->db->where('id_atasan',1);
        $this->db->update('atasan_kaprov', $data);
	}	
	
	
	public function rekap_nilai_ckp($bulan,$tahun,$bidang){
        $data = array();
		$i=0;
		
		if($bidang!=10) {
			$Q = $this->db->query("SELECT * FROM m_satker MSS, pegawai_jabatan PJJ LEFT JOIN (SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = ".$bulan." AND MP.tahun = ".$tahun."  GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg ) AS DEF ON DEF.id_peg = PJJ.id_pegawai WHERE PJJ.id_satker_jabatan = MSS.id_satker AND MSS.group_eselon_tiga = ".$bidang." AND PJJ.status_peg = 1 ORDER BY id_satker_jabatan");		
		}else {
			$Q = $this->db->query("SELECT * FROM m_satker MSS, pegawai_jabatan PJJ LEFT JOIN (SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = ".$bulan." AND MP.tahun = ".$tahun."  GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg ) AS DEF ON DEF.id_peg = PJJ.id_pegawai WHERE PJJ.id_satker_jabatan = MSS.id_satker AND PJJ.status_peg = 1 ORDER BY MSS.group_eselon_tiga ASC, MSS.id_satker, id_eselon_jabatan");		
		}
		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['total_realisasi']!=NULL&&$data[$i]['jm_per_ketepatan']!=NULL&&$data[$i]['jm_per_kualitas']!=NULL) {
					$nilai_realisasi = $data[$i]['total_realisasi']/$data[$i]['id'];
					$data[$i]['nilai_realisasi'] = number_format((float)$nilai_realisasi, 2, '.', '');
					
					$ketptan = $data[$i]['jm_per_ketepatan']/$data[$i]['id'];
					$kulits = $data[$i]['jm_per_kualitas']/$data[$i]['id'];
					$nilai_kualitas= ($ketptan+$kulits)/2;
					$data[$i]['nilai_kualitas'] = number_format((float)$nilai_kualitas, 2, '.', '');
					
					$nilai_total = ($nilai_realisasi+$nilai_kualitas)/2;
					$data[$i]['nilai_total'] = number_format((float)$nilai_total, 2, '.', '');
					
				}else{
					$data[$i]['nilai_realisasi']= 0; 
					$data[$i]['nilai_kualitas'] = 0;
					$data[$i]['nilai_total'] = 0;
				}
				
				
				
				$i++;
			}
        }
        $Q->free_result();
        return $data;
    }
	
	public function z_rekap_nilai_ckp($bulan,$tahun,$bidang){
        $data = array();
		$i=0;
		
		if($bidang!=10) {
			$Q = $this->db->query("SELECT id_peg AS id_pegawai, nama AS nama_peg, nama_fungsional, nama_jabatan, satker, tingkat_realisasi AS nilai_realisasi, tingkat_kualitas AS nilai_kualitas, nilai_ckp AS nilai_total  FROM z_rek_header WHERE group_eselon_tiga = ".$bidang." AND tahun = ".$tahun." AND bln = ".$bulan." ORDER BY group_eselon_tiga ASC, id_satker ASC, nama_jabatan ASC");		
		}else {
			$Q = $this->db->query("SELECT id_peg AS id_pegawai, nama AS nama_peg, nama_fungsional, nama_jabatan, satker, tingkat_realisasi AS nilai_realisasi, tingkat_kualitas AS nilai_kualitas, nilai_ckp AS nilai_total  FROM z_rek_header WHERE tahun = ".$tahun." AND bln = ".$bulan." ORDER BY group_eselon_tiga ASC, id_satker ASC, nama_jabatan ASC");		
		}
		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;			
				$i++;
			}
        }
        $Q->free_result();
        return $data;
    }
	
	public function target_laporan($bulan,$tahun,$bidang){
        $data = array();
		$i=0;
		
		if($bidang!=10) {
			$Q = $this->db->query("SELECT * FROM m_satker MS, pegawai_jabatan AS PJ LEFT JOIN ( SELECT BLM.id_pegawai, BLM.jumlah_belum_lapor, SDH.jumlah_sudah_lapor FROM (SELECT COUNT(*) as jumlah_belum_lapor, id_pegawai FROM transaksi_kerja WHERE id_tk NOT IN (select id_tk FROM transaksi_k_harian_dinilai) AND bln_ckp = ".$bulan." AND tahun = ".$tahun." GROUP BY id_pegawai) AS BLM LEFT JOIN (SELECT COUNT(*) AS jumlah_sudah_lapor, id_pegawai FROM transaksi_kerja WHERE id_tk IN (select id_tk FROM transaksi_k_harian_dinilai) AND bln_ckp = ".$bulan." AND tahun = ".$tahun." GROUP BY id_pegawai) AS SDH ON BLM.id_pegawai = SDH.id_pegawai ) AS TK ON PJ.id_pegawai = TK.id_pegawai WHERE PJ.id_satker_jabatan = MS.id_satker AND MS.group_eselon_tiga = ".$bidang." ORDER BY TK.jumlah_belum_lapor DESC ");		
		}else {
			$Q = $this->db->query("SELECT * FROM m_satker MS, pegawai_jabatan AS PJ LEFT JOIN ( SELECT BLM.id_pegawai, BLM.jumlah_belum_lapor, SDH.jumlah_sudah_lapor FROM (SELECT COUNT(*) as jumlah_belum_lapor, id_pegawai FROM transaksi_kerja WHERE id_tk NOT IN (select id_tk FROM transaksi_k_harian_dinilai) AND bln_ckp = ".$bulan." AND tahun = ".$tahun." GROUP BY id_pegawai) AS BLM LEFT JOIN (SELECT COUNT(*) AS jumlah_sudah_lapor, id_pegawai FROM transaksi_kerja WHERE id_tk IN (select id_tk FROM transaksi_k_harian_dinilai) AND bln_ckp = ".$bulan." AND tahun = ".$tahun." GROUP BY id_pegawai) AS SDH ON BLM.id_pegawai = SDH.id_pegawai ) AS TK ON PJ.id_pegawai = TK.id_pegawai WHERE PJ.id_satker_jabatan = MS.id_satker ORDER BY TK.jumlah_belum_lapor DESC ");		
		}
		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['jumlah_sudah_lapor']==NULL){
					$data[$i]['jumlah_sudah_lapor']=0;
				}
				if($data[$i]['jumlah_belum_lapor']==NULL){
					$data[$i]['jumlah_belum_lapor']=0;
				}
				$data[$i]['jumlah_pekerjaan']= $data[$i]['jumlah_sudah_lapor']+$data[$i]['jumlah_belum_lapor'];
				$i++;
			}
        }
		
        $Q->free_result();
        return $data;
    }
	
	public function rekap_penilaian($bulan,$tahun,$bidang){
        $data = array();
		$i=0;
		
		if($bidang!=10) {
			$Q = $this->db->query("SELECT * FROM m_satker MS, pegawai_jabatan AS PJ LEFT JOIN
			(SELECT SMSH.id_m_jbtn_penilai, SMSH.jumlah_all_dinilai, SMSH.jumlah_sudah_dinilai,BLM.jumlah_belum_dinilai FROM (SELECT SMU.id_m_jbtn_penilai, SMU.jumlah_all_dinilai, SDH.jumlah_sudah_dinilai FROM (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_all_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai != 0 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS SMU LEFT JOIN (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_sudah_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai = 2 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS SDH ON SMU.id_m_jbtn_penilai=SDH.id_m_jbtn_penilai ) AS SMSH LEFT JOIN (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_belum_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai = 1 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS BLM ON BLM.id_m_jbtn_penilai=SMSH.id_m_jbtn_penilai) 			
			AS LP_NILAI ON LP_NILAI.id_m_jbtn_penilai = PJ.id_m_jabatan WHERE PJ.id_satker_jabatan = MS.id_satker AND PJ.id_eselon_jabatan!=5  AND MS.group_eselon_tiga = ".$bidang );		
		}else {
			$Q = $this->db->query("SELECT * FROM m_satker MS, pegawai_jabatan AS PJ LEFT JOIN
			(SELECT SMSH.id_m_jbtn_penilai, SMSH.jumlah_all_dinilai, SMSH.jumlah_sudah_dinilai,BLM.jumlah_belum_dinilai FROM (SELECT SMU.id_m_jbtn_penilai, SMU.jumlah_all_dinilai, SDH.jumlah_sudah_dinilai FROM (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_all_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai != 0 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS SMU LEFT JOIN (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_sudah_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai = 2 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS SDH ON SMU.id_m_jbtn_penilai=SDH.id_m_jbtn_penilai ) AS SMSH LEFT JOIN (SELECT MP.id_m_jbtn_penilai,COUNT(*) jumlah_belum_dinilai FROM m_pekerjaan MP, transaksi_kerja TK, transaksi_k_harian_dinilai TKH WHERE MP.id_pekerjaan = TK.id_pekerjaan AND TK.id_tk = TKH.id_tk AND TKH.status_dinilai = 1 AND TK.bln_ckp = ".$bulan." AND TK.tahun=".$tahun."  GROUP BY MP.id_m_jbtn_penilai) AS BLM ON BLM.id_m_jbtn_penilai=SMSH.id_m_jbtn_penilai) 			
			AS LP_NILAI ON LP_NILAI.id_m_jbtn_penilai = PJ.id_m_jabatan WHERE PJ.id_satker_jabatan = MS.id_satker AND PJ.id_eselon_jabatan!=5 ");		
		}
		
        if($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;	
				if($data[$i]['jumlah_sudah_dinilai']==NULL){
					$data[$i]['jumlah_sudah_dinilai']=0;
				}
				if($data[$i]['jumlah_belum_dinilai']==NULL){
					$data[$i]['jumlah_belum_dinilai']=0;
				}
				if($data[$i]['jumlah_all_dinilai']==NULL){
					$data[$i]['jumlah_all_dinilai']=0;
				}				
				$i++;
			}
        }
		
        $Q->free_result();
        return $data;
    }
	
	public function jml_blm_lapor($bulan,$tahun,$level){
        $data = array();
		
		if($level!=10) {
			$Q = $this->db->query("SELECT COUNT(*) AS jumlah FROM transaksi_kerja TK, m_pekerjaan MP, m_satker MS WHERE TK.id_pekerjaan = MP.id_pekerjaan AND MP.id_satker = MS.id_satker AND TK.id_tk NOT IN (SELECT id_tk FROM transaksi_k_harian_dinilai) AND TK.bln_ckp = ".$bulan." AND TK.tahun = ".$tahun." AND MS.group_eselon_tiga = ".$level);		
		}else {
			$Q = $this->db->query("SELECT COUNT(*) AS jumlah FROM transaksi_kerja TK, m_pekerjaan MP, m_satker MS WHERE TK.id_pekerjaan = MP.id_pekerjaan AND MP.id_satker = MS.id_satker AND TK.id_tk NOT IN (SELECT id_tk FROM transaksi_k_harian_dinilai) AND TK.bln_ckp = ".$bulan." AND TK.tahun = ".$tahun );		
		}
		
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}	
        $Q->free_result();
        return $data;
    }
	public function jml_blm_nilai($bulan,$tahun,$level){
        $data = array();
		
		if($level!=10) {
			$Q = $this->db->query("SELECT COUNT(*) AS jumlah FROM transaksi_k_harian_dinilai TKH, transaksi_kerja TK, m_pekerjaan MP, m_satker MS WHERE TKH.id_tk = TK.id_tk AND TK.id_pekerjaan = MP.id_pekerjaan AND MP.id_satker = MS.id_satker AND TKH.status_dinilai = 1 AND TK.bln_ckp = ".$bulan." AND TK.tahun = ".$tahun." AND MS.group_eselon_tiga = ".$level);		
		}else {
			$Q = $this->db->query("SELECT COUNT(*) AS jumlah FROM transaksi_k_harian_dinilai TKH, transaksi_kerja TK, m_pekerjaan MP, m_satker MS WHERE TKH.id_tk = TK.id_tk AND TK.id_pekerjaan = MP.id_pekerjaan AND MP.id_satker = MS.id_satker AND TKH.status_dinilai = 1 AND TK.bln_ckp = ".$bulan." AND TK.tahun = ".$tahun );		
		}
		
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}	
        $Q->free_result();
        return $data;
    }

	public function master_pekerjaan_simp_permanen($id_pekerjaan){
		$data = array(
			'diusulkan' => 0
		);
	    $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->update('m_pekerjaan', $data);
	}
	public function master_pekerjaan_nonaktifkan($id_pekerjaan){
		$data = array(
			'status_pekerjaan' => 0
		);
	    $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->update('m_pekerjaan', $data);
	}
	public function master_pekerjaan_aktifkan($id_pekerjaan){
		$data = array(
			'status_pekerjaan' => 1
		);
	    $this->db->where('id_pekerjaan', $id_pekerjaan);
        $this->db->update('m_pekerjaan', $data);
	}
	public function pegawai_nonaktifkan($id_pegawai){
		$data = array(
			'status_peg' => 0
		);
	    $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $data);
	}	
	public function pegawai_aktifkan($id_pegawai){
		$data = array(
			'status_peg' => 1
		);
	    $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai', $data);
	}
	
	
	
	
	
	public function cek_trak_admin ($bulan,$tahun){
        $data = array();
		$Q = $this->db->query("SELECT * FROM dhline WHERE bln_ckp_dh = ".$bulan." AND tahun_dh = ".$tahun);
		if($Q->num_rows() > 0) {
			$data = $Q->row_array();
		}	
        $Q->free_result();
        return $data;
    }
	
	
	
	
	
	/* SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = 1 AND MP.tahun = 2018 GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg  */

	
/* 	CREATE VIEW m_transaksi_pekerjaan AS ( select t.id_tk AS id_tk,t.id_pegawai AS id_pegawai,mp.id_pekerjaan AS id_pekerjaan,mp.nama AS nama,mp.satuan AS satuan,mp.id_satker AS id_satker, mp.status_pekerjaan AS status_pekerjaan,mp.fungsional_tipe AS fungsional_tipe,mp.id_m_jbtn_penilai AS id_m_jbtn_penilai,t.target AS target,t.bln_ckp AS bln_ckp,t.tahun AS tahun,t.dibuat_by AS dibuat_by,t.keterangan AS keterangan,t.is_lock AS is_lock, ms.kode_human AS kode_human from (m_satker ms, m_pekerjaan mp join transaksi_kerja t) where (t.id_pekerjaan = mp.id_pekerjaan and ms.id_satker = mp.id_satker) ) */
	
	
}