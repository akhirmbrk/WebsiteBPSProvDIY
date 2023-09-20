<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function edit_role_user($id)
    {
        $atribut = $this->input->post('roleEdit');

        if ($atribut == "SuperAdmin") {
            $data = array(
                'super_admin' => 1,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 0,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 0,
            );
        } elseif ($atribut == "AdminTimKerjaProv") {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 1,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 0,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 0,
            );
        } elseif ($atribut == "AdminTimKerjaKabKot") {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 1,
                "kepala_prov" => 0,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 0,
            );
        } elseif ($atribut == "KepalaProv") {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 1,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 0,
            );
        } elseif ($atribut == "KepalaKabKot") {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 0,
                "kepala_kabkota" => 1,
                "ketua_tim_kerja_prov" => 0,
            );
        } elseif ($atribut == "KetuaTimKerjaProvinsi") {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 0,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 1,
            );
        } else {
            $data = array(
                'super_admin' => 0,
                "admin_tim_kerja_prov" => 0,
                "admin_tim_kerja_kabkota" => 0,
                "kepala_prov" => 0,
                "kepala_kabkota" => 0,
                "ketua_tim_kerja_prov" => 0,
            );
        }
        $this->db->where('ida', $id);
        $this->db->update('userapp', $data);

        $hasil['point'] = 'sukses';

        return $hasil;
    }

    public function list_user_prov()
    {
        $data = array();
        $i = 0;

        // $Q = $this->db->query("SELECT * FROM kegiatan WHERE oleh = " . $nip . " ORDER BY idm DESC");
        $Q = $this->db->query("SELECT id_pegawai, nip_lama, nama_peg FROM pegawai");


        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
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



    public function get_users_live($limit, $start, $keyword, $count)
    {
        //  $this->db->get('userapp', $limit, $start)->result_array();

        $this->db->select('*');
        $this->db->from('pegawai');
        if ($keyword) {
            $keyword = $keyword['keyword'];
            if ($keyword) {
                $this->db->like("nama_peg", $keyword);
                $this->db->or_like("nip_lama", $keyword);
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

    public function get_users_kabkota_live($limit, $start, $keyword, $count)
    {
        $this->db->select('*');
        $this->db->from('pegawai_kabkota');
        if ($keyword) {
            $keyword = $keyword['keyword'];
            if ($keyword) {
                $this->db->like("nama_pegawai_kabkota", $keyword);
                $this->db->or_like("nip_lama_pegawai_kabkota", $keyword);
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
        // var_dump($query->result_array());

        return array();
    }


    public function get_jumlah_user()
    {
        return $this->db->get('userapp')->num_rows();
    }

    /* SELECT SUM(ABC.jumlah_realisasi/ABC.target*100) AS total_realisasi, COUNT(ABC.id_pekerjaan) AS id, SUM(ABC.jumlah_persen_ketepatan/ABC.jumlah_realisasi) AS jm_per_ketepatan, SUM(ABC.jumlah_persen_kualitas/ABC.jumlah_realisasi) AS jm_per_kualitas, ABC.id_peg FROM ( SELECT MP.id_pekerjaan, MP.target, sum(TKH.realisasi) AS jumlah_realisasi, sum(TKH.realisasi*TKH.ketepatan) AS jumlah_persen_ketepatan, sum(TKH.realisasi*TKH.kualitas) AS jumlah_persen_kualitas, MP.id_pegawai AS id_peg FROM transaksi_kerja MP LEFT JOIN transaksi_k_harian_sdh_dinilai TKH ON TKH.id_tk = MP.id_tk WHERE MP.bln_ckp = 1 AND MP.tahun = 2018 GROUP BY MP.id_pekerjaan, MP.id_pegawai) AS ABC GROUP BY ABC.id_peg  */


    /* 	CREATE VIEW m_transaksi_pekerjaan AS ( select t.id_tk AS id_tk,t.id_pegawai AS id_pegawai,mp.id_pekerjaan AS id_pekerjaan,mp.nama AS nama,mp.satuan AS satuan,mp.id_satker AS id_satker, mp.status_pekerjaan AS status_pekerjaan,mp.fungsional_tipe AS fungsional_tipe,mp.id_m_jbtn_penilai AS id_m_jbtn_penilai,t.target AS target,t.bln_ckp AS bln_ckp,t.tahun AS tahun,t.dibuat_by AS dibuat_by,t.keterangan AS keterangan,t.is_lock AS is_lock, ms.kode_human AS kode_human from (m_satker ms, m_pekerjaan mp join transaksi_kerja t) where (t.id_pekerjaan = mp.id_pekerjaan and ms.id_satker = mp.id_satker) ) */
}
