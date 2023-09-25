<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tim_kerja_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_teamkerja($limit, $start, $search, $count)
    {

        $this->db->order_by('z_team.id_zteam', 'DESC')->select('*');
        $this->db->from('z_team');
        $this->db->join('z_periode', 'z_team.id_zperiode = z_periode.id_zperiode');

        if ($search) {
            // Jika $search adalah sebuah array, maka ambil komponen keyword dan periode
            if (is_array($search) && isset($search['keyword']) || isset($search['periode'])) {
                $search_keyword = $search['keyword'];
                $periode = $search['periode'];
                // var_dump($tim);
                // Jika ada kata kunci, tambahkan kondisi LIKE
                if ($search_keyword) {
                    $this->db->like("nama_team", $search_keyword);
                }

                // Jika ada periode, tambahkan kondisi LIKE
                if ($periode) {
                    $this->db->group_start();
                    foreach ($periode as $value) {
                        $this->db->or_where("z_team.id_zperiode", $value);
                    }
                    $this->db->group_end();
                } else {
                    $this->db->group_start();
                    $this->db->where("z_periode.aktif", 1);
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



    public function list_filter_teamkerja($id_zperiode)
    {
        $data = array();
        $i = 0;
        // ketika menampilkan menu default sebelum mengklik tahun

        if ($id_zperiode == 0) {

            $A = $this->db->query("SELECT * FROM z_periode where aktif = 1 ");


            // untuk menampilkan data tabel yang sedikit gunakan if row seperti ini
            // nama variabel ($) tahunaktif buat sendiri

            if ($A->num_rows() > 0) {
                $tahunaktif = $A->row_array();
                $id_zperiode = $tahunaktif['id_zperiode'];
            }
            $A->free_result();
        }


        // var_dump($id_zperiode);
        $P = $this->db->query("SELECT * FROM z_team T, z_periode P WHERE P.id_zperiode = T.id_zperiode  AND P.id_zperiode = " . $id_zperiode);

        // untuk menampilkan data tabel yang banyak gunakan if row seperti ini. tapi,
        //data yg banyak itu bukan hanya sebatas baris/row nya banyak, tapi banyak anunya? 
        // var_dump($P->result_array());
        if ($P->num_rows() > 0) {
            foreach ($P->result_array() as $row) {
                $data[] = $row;
            }
        }


        return $data;
    }

    public function add_teams($nama, $periode)
    {

        $data = array(
            'nama_team' => $nama,
            'id_zperiode' => $periode,
            'id_ketuatim' => null
        );
        // var_dump($data);

        $this->db->insert('z_team', $data);

        $hasil['point'] = 'sukses';

        return $hasil;
    }

    public function update_teams($id, $ketua)
    {

        $data = array(
            'id_ketuatim' => $ketua
        );
        // var_dump($data);
        $this->db->where('id_zteam', $id);
        $this->db->update('z_team', $data);

        $hasil['point'] = 'sukses';

        return $hasil;
    }




    public function show_tim_kerja($id)
    {
        $data = array();
        $Q = $this->db->query("SELECT * FROM z_team WHERE id_zteam = " . $id);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data['id_zteam'] = null;
        }
        $Q->free_result();
        return $data;
    }

    public function show_tim_kerja_bynama($nama, $periode)
    {
        $data = array();
        // var_dump($data);

        $Q = $this->db->query("SELECT * FROM z_team WHERE nama_team = " . "'" . $nama . "'" . " AND id_zperiode = " . $periode);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data = null;
        }
        $Q->free_result();
        // var_dump($data);

        return $data;
    }
}
