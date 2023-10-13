<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Progres_Kegiatan_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_progres_tiap_kegiatan()
    {
        $Q = $this->db->select('A.persen_progres,A.deskripsi_progres,B.*,C.kode');
        $Q = $this->db->from('progres_kegiatan A');
        $Q = $this->db->join('kegiatan B', 'A.id_kegiatan = B.id_kegiatan');
        $Q = $this->db->join('bps C', 'A.id_bps = C.kode');
        // $Q = $this->db->where('A.id_pkegiatan', $kegiatan);
        // $Q = $this->db->where('A.id_bps', $bps);
        $Q = $this->db->get();

        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data = null;
        }
        $Q->free_result();
        // var_dump($data);

        return $data;
    }

    public function show_progres_tiap_kegiatan($kegiatan, $bps)
    {
        $Q = $this->db->select('A.*,B.*,C.kode');
        $Q = $this->db->from('progres_kegiatan A');
        $Q = $this->db->join('kegiatan B', 'A.id_kegiatan = B.id_kegiatan');
        $Q = $this->db->join('bps C', 'A.id_bps = C.kode');
        $Q = $this->db->where('A.id_kegiatan', $kegiatan);
        $Q = $this->db->where('A.id_bps', $bps);
        $Q = $this->db->get();

        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data = null;
        }
        $Q->free_result();
        // var_dump($data);

        return $data;
    }

    public function update_progres($id, $kegiatan, $bps)
    {

        if ($id != 0) {
            $data = array(
                'id_bps' => $bps,
                'id_kegiatan' => $kegiatan,
                'persen_progres' => $this->input->post('progresKegiatan'),
                'deskripsi_progres' => $this->input->post('deskripsiKegiatan'),
                'last_time_update' => date("Y-m-d H:i"),
                'last_user_update' => $_SESSION['nama'],

            );

            $this->db->where('id_pkegiatan', $id);
            $this->db->update('progres_kegiatan', $data);
        } else {
            $data = array(
                'id_bps' => $bps,
                'id_kegiatan' => $kegiatan,
                'persen_progres' => 0,
                'deskripsi_progres' => ""

            );

            $this->db->insert('progres_kegiatan', $data);
        }


        $hasil['point'] = 'sukses';

        return $hasil;
    }

    // public function add_progres($bps, $kegiatan)
    // {

    //     // Tambah ke tabel progres_kegiatan 
    //     $data1 = array(
    //         'id_bps' => $bps,
    //         'id_pkegiatan' => $kegiatan,
    //         'persen_progres_' => $this->input->post('progresKegiatan'),
    //         'deskripsi_progres' => $this->input->post('deskripsiKegiatan'),
    //         'time_update' => date("Y-m-d H:i"),
    //         'last_user_update' => $_SESSION['nama'],
    //     );
    //     $this->db->insert('progres_kegiatan', $data1);


    //     $hasil['point'] = 'sukses';

    //     return $hasil;
    // }
}
