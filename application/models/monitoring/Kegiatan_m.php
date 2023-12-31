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
        // $unix_now = strtotime("now");
        $NOW = date("Y-m-d");
        $unix_now = strtotime($NOW);

        $unix_tgl_start = strtotime($tgl_start);
        $unix_tgl_end = strtotime($tgl_end);
        // var_dump($unix_now);
        // var_dump($unix_tgl_start);
        // var_dump($unix_tgl_end);

        $jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) )e ");

        $jedah_res = $jedah->row_array();


        if ($unix_now > $unix_tgl_end || $unix_tgl_start > $unix_tgl_end) {
            $hasil['point'] = 'lewat';
            $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1  . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        }
        // else if ($jedah_res['jumlah'] > 2) {
        //     $hasil['point'] = 'block';
        //     $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        // }
        else {
            // Tambah ke tabel kegiatan 
            $data = array(
                'judul_kegiatan' => $this->input->post("judulKegiatan"),
                'tgl_start' => $tgl_start,
                'tgl_end' => $tgl_end,
                'progres_71' => 0,
                'progres_1' => 0,
                'progres_2' => 0,
                'progres_3' => 0,
                'progres_4' => 0,
                'id_tim_kerja' => $this->input->post("timKerja"),
                'id_parent' => 0,
                'KodeBPS' => '3400'
            );
            // var_dump($data);
            $this->db->insert('kegiatan', $data);

            $hasil['point'] = 'sukses';
        }


        return $hasil;
    }

    public function add_sub_kegiatan()
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
        $NOW = date("Y-m-d");
        $unix_now = strtotime($NOW);

        $unix_tgl_start = strtotime($tgl_start);
        $unix_tgl_end = strtotime($tgl_end);

        $jedah = $this->db->query("SELECT COUNT(*) AS jumlah FROM ( SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_end . " BETWEEN UNIX_TIMESTAMP(tgl_start) AND UNIX_TIMESTAMP(tgl_end) UNION SELECT * FROM kegiatan WHERE " . $unix_tgl_start . " < UNIX_TIMESTAMP(tgl_start) AND " . $unix_tgl_end . " > UNIX_TIMESTAMP(tgl_end) )e ");

        $jedah_res = $jedah->row_array();

        $idParent = $this->input->post("id_parent_kegiatan");

        $query = $this->db->select('*');
        $query = $this->db->from('kegiatan');
        $query = $this->db->where('id_kegiatan', $idParent);
        $query = $this->db->get()->result_array();
        $tgl_start_parent = strtotime($query[0]['tgl_start']);
        $tgl_end_parent = strtotime($query[0]['tgl_end']);
        // var_dump($tgl_start_parent);
        // var_dump($tgl_end_parent);        

        if ($tgl_start_parent > $unix_tgl_start || $tgl_end_parent < $unix_tgl_end || $tgl_start_parent > $tgl_end_parent) {
            $hasil['point'] = 'lewat';
            $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1  . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        } else if ($unix_tgl_start < $tgl_start_parent || $unix_tgl_start > $tgl_end_parent) {
            $hasil['point'] = 'block';
            $hasil['tanggal'] = $tgl_dh_1 . "-" . $bln_dh_1 . "-" . $thn_dh_1 . " s.d " . $tgl_dh_2 . "-" . $bln_dh_2 . "-" . $thn_dh_2;
        } else {
            $data = array(
                'judul_kegiatan' => $this->input->post("judulKegiatan"),
                'tgl_start' => $tgl_start,
                'tgl_end' => $tgl_end,
                'progres_71' => 0,
                'progres_1' => 0,
                'progres_2' => 0,
                'progres_3' => 0,
                'progres_4' => 0,
                'id_tim_kerja' => $this->input->post("timKerja"),
                'id_parent' => $idParent,
                'KodeBPS' => '3400'
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


    public function update_kegiatan($id, $kodeKabKota)
    {
        $data = array(
            'progres_' . $kodeKabKota => $this->input->post('progresKegiatan'),
            'deskripsi_kegiatan' => $this->input->post('deskripsiKegiatan'),
            'time_update' => date("Y-m-d H:i"),
            'last_user_update' => $_SESSION['nama'],

        );
        $this->db->where('id_kegiatan', $id);
        $this->db->update('kegiatan', $data);


        $hasil['point'] = 'sukses';

        return $hasil;
    }

    public function hapus_kegiatan($id)
    {
        $this->db->where('id_kegiatan', $id);
        $this->db->delete('kegiatan');

        $this->db->where('id_parent', $id);
        $this->db->delete('kegiatan');
    }

    public function hapus_subkegiatan($id)
    {
        $this->db->where('id_kegiatan', $id);
        $this->db->delete('kegiatan');
    }

    public function filter_kegiatan($tim)
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT * FROM kegiatan WHERE id_tim_kerja = " . $tim . " ORDER BY tgl_start DESC");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function get_kegiatan($limit, $start)
    {
        return $this->db->order_by('id_kegiatan', 'DESC')->get('kegiatan', $limit, $start)->result_array();
    }

    public function get_kegiatan_live($limit, $start, $search, $count)
    {
        $this->db->order_by('id_kegiatan', 'DESC');
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->where('id_parent', 0);

        if ($search) {
            // Jika $search adalah sebuah array, maka ambil komponen keyword dan periode
            if (is_array($search) && isset($search['keyword']) || isset($search['periode']) || isset($search['timKerja'])) {
                $search_keyword = $search['keyword'];
                $periode = $search['periode'];
                $tim = $search['timKerja'];

                // Jika ada kata kunci, tambahkan kondisi LIKE
                if ($search_keyword) {
                    $this->db->like("judul_kegiatan", $search_keyword);
                }

                // Jika ada periode, tambahkan kondisi LIKE
                if ($periode) {
                    $this->db->group_start();
                    foreach ($periode as $value) {
                        $this->db->or_like("YEAR(tgl_start)", $value);
                        $this->db->or_like("YEAR(tgl_end)", $value);
                    }

                    $this->db->group_end();
                }

                if ($tim) {
                    $this->db->group_start();
                    foreach ($tim as $tim_value) {
                        $this->db->or_where("id_tim_kerja", $tim_value);
                    }
                    $this->db->group_end();
                }
            }
        }

        if ($count) {
            return $this->db->count_all_results();
        } else {
            $this->db->limit($limit, $start);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        return array();
    }


    public function get_sub_kegiatan_live($parent)
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->where('id_parent', $parent);

        // if ($keyword) {
        //     $keyword = $keyword['keyword'];
        //     if ($keyword) {
        //         $this->db->like("judul_kegiatan", $keyword);
        //     }
        // }
        // if ($count) {
        //     return $this->db->count_all_results();
        // } else {
        //     $this->db->limit($limit, $start);
        //     $query = $this->db->get();

        //     if ($query->num_rows() > 0) {
        //         return $query->result_array();
        //     }
        // }

        return $this->db->get()->result_array();
    }

    public function get_jumlah_kegiatan()
    {
        return $this->db->get('kegiatan')->num_rows();
    }

    public function get_id_parent_kegiatan()
    {
        $query =  $this->db->select('id_parent');
        $query =  $this->db->from('kegiatan');
        $query =  $this->db->where('id_parent !=', 0);

        return $query->get()->result_array();
    }

    public function get_id_kegiatan($parent, $namaKegiatan)
    {
        $query =  $this->db->select('id_kegiatan');
        $query =  $this->db->from('kegiatan');
        $query =  $this->db->where('id_parent', $parent);
        $query =  $this->db->where('judul_kegiatan', $namaKegiatan);

        return $query->get()->row_array();
    }

    public function show_kegiatan($id)
    {
        $query =  $this->db->select('*');
        $query =  $this->db->from('kegiatan');
        $query =  $this->db->where('id_kegiatan', $id);

        return $query->get()->result_array();
    }
    /* SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = 1 AND MP.tahun = 2018 GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg  */


    /* 	CREATE VIEW m_transaksi_pekerjaan AS ( select t.id_tk AS id_tk,t.id_pegawai AS id_pegawai,mp.id_pekerjaan AS id_pekerjaan,mp.nama AS nama,mp.satuan AS satuan,mp.id_satker AS id_satker, mp.status_pekerjaan AS status_pekerjaan,mp.fungsional_tipe AS fungsional_tipe,mp.id_m_jbtn_penilai AS id_m_jbtn_penilai,t.target AS target,t.bln_ckp AS bln_ckp,t.tahun AS tahun,t.dibuat_by AS dibuat_by,t.keterangan AS keterangan,t.is_lock AS is_lock, ms.kode_human AS kode_human from (m_satker ms, m_pekerjaan mp join transaksi_kerja t) where (t.id_pekerjaan = mp.id_pekerjaan and ms.id_satker = mp.id_satker) ) */
}
