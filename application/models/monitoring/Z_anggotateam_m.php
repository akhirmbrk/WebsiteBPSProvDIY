<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Z_anggotateam_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_all_team()
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT * FROM z_anggotateam A JOIN tim_kerja B ON A.id_team = B.id_team JOIN bps C ON A.KodeBPS = C.KodeBPS JOIN z_periode D ON A.Id_Periode = D.id_zperiode WHERE ketua_tim = 1 ORDER BY Id_Periode ASC");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function get_teams($limit, $start)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('z_anggotateam');
        $query = $this->db->join('tim_kerja', 'tim_kerja.id_team = z_anggotateam.id_team');
        $query = $this->db->join('bps', 'bps.KodeBPS = z_anggotateam.KodeBPS');
        $query = $this->db->join('z_periode', 'z_periode.id_zperiode = z_anggotateam.Id_Periode');
        $query = $this->db->where('ketua_tim =', 1);
        $query = $this->db->limit($limit, $start);;
        $query = $this->db->get()->result_array();

        return $query;
    }


    public function list_anggota_team($id, $bps, $periode)
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT `id_team`,`id_user`,`kodeBPS`,`Id_Periode`,`ketua_tim`,`nip`,`namaU` FROM `z_anggotateam` A JOIN `userapp` B ON A.id_user = B.ida  WHERE A.id_team = $id AND A.KodeBPS = $bps AND A.Id_Periode = $periode");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function add_teams($iduser, $ketuatim)
    {

        $data = array(
            'id_team' => $this->input->post("timKerja"),
            'id_user' => $iduser,
            'kodeBPS' => $this->input->post("kodeBPS"),
            'Id_Periode' => $this->input->post("periode"),
            'ketua_tim' => $ketuatim
        );
        // var_dump($data);
        $this->db->insert('z_anggotateam', $data);

        $hasil['point'] = 'sukses';

        return $hasil;
    }


    public function get_jumlah_team()
    {
        return $this->db->get_where('z_anggotateam', array('ketua_tim' => 1))->num_rows();
    }
}
