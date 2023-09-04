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

        $Q = $this->db->query("SELECT * FROM z_anggotateam A JOIN tim_kerja B ON A.id_team = B.id_team JOIN bps C ON A.KodeBPS = C.KodeBPS WHERE ketua_tim = 1");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
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
}
