<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_kegiatan()
    {
        $tgl_dh_1 = substr($this->input->post("tglStart"), 3, 2);
        $bln_dh_1 = substr($this->input->post("tglStart"), 0, 2);
        $thn_dh_1 = substr($this->input->post("tglStart"), 6, 4);
        $tgl_start = $thn_dh_1 . "-" . $bln_dh_1 . "-" . $tgl_dh_1;


        $tgl_dh_2 = substr($this->input->post("tglEnd"), 3, 2);
        $bln_dh_2 = substr($this->input->post("tglEnd"), 0, 2);
        $thn_dh_2 = substr($this->input->post("tglEnd"), 6, 4);
        $tgl_end = $thn_dh_2 . "-" . $bln_dh_2 . "-" . $tgl_dh_2;

        // jika waktu kurang
        $unix_now = strtotime("now");

        $unix_tgl_start = strtotime($tgl_start);
        $unix_tgl_end = strtotime($tgl_end);

        $jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) )e ");

        $jedah_res = $jedah->row_array();


        if ($unix_now > $unix_tgl_start || $unix_now > $unix_tgl_end || $unix_tgl_start > $unix_tgl_end) {
            $hasil['point'] = 'lewat';
            $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1  . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        } else if ($jedah_res['jumlah'] > 1) {
            $hasil['point'] = 'block';
            $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        } else {
            $data = array(
                'judul_kegiatan' => $this->input->post("judulKegiatan"),
                'tgl_start' => $tgl_start,
                'tgl_end' => $tgl_end,
                'progres_kegiatan' => 0,
                'id_tim_kerja' => $this->input->post("timKerja"),
                // 'id_tim_kerja' => '2',
                'deskripsi_kegiatan' => " ",
            );
            // var_dump($data);
            $this->db->insert('kegiatan', $data);
            // $data1 = array(
            //     'id_team' => $this->input->post("timKerja"),
            //     'id_kegiatan' => 
            // );
            // $this->db->insert('kegiatan_tim_kerja', $data1);
            $hasil['point'] = 'sukses';
        }


        return $hasil;
    }

    public function list_kegiatan()
    {
        $data = array();
        $i = 0;

        // $Q = $this->db->query("SELECT * FROM kegiatan WHERE oleh = " . $nip . " ORDER BY idm DESC");
        $Q = $this->db->query("SELECT * FROM kegiatan ORDER BY tgl_start DESC");


        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function detail_kegiatan($id)
    {
        $data = array();
        $Q = $this->db->query("SELECT * FROM kegiatan WHERE  id_kegiatan = " . $id);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data['id_kegiatan'] = 0;
        }
        $Q->free_result();
        return $data;
    }


    public function update_kegiatan($id)
    {
        $data = array(
            'progres_kegiatan' => $this->input->post('progresKegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsiKegiatan')

        );
        $this->db->where('id_kegiatan', $id);
        $this->db->update('kegiatan', $data);

        $hasil['point'] = 'sukses';

        return $hasil;
    }

    /* SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = 1 AND MP.tahun = 2018 GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg  */


    /* 	CREATE VIEW m_transaksi_pekerjaan AS ( select t.id_tk AS id_tk,t.id_pegawai AS id_pegawai,mp.id_pekerjaan AS id_pekerjaan,mp.nama AS nama,mp.satuan AS satuan,mp.id_satker AS id_satker, mp.status_pekerjaan AS status_pekerjaan,mp.fungsional_tipe AS fungsional_tipe,mp.id_m_jbtn_penilai AS id_m_jbtn_penilai,t.target AS target,t.bln_ckp AS bln_ckp,t.tahun AS tahun,t.dibuat_by AS dibuat_by,t.keterangan AS keterangan,t.is_lock AS is_lock, ms.kode_human AS kode_human from (m_satker ms, m_pekerjaan mp join transaksi_kerja t) where (t.id_pekerjaan = mp.id_pekerjaan and ms.id_satker = mp.id_satker) ) */
}
