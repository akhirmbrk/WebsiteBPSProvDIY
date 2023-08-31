<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tim_kerja_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_tim_kerja()
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT * FROM tim_kerja ORDER BY id_team ASC");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function show_tim_kerja($id)
    {
        $data = array();
        $Q = $this->db->query("SELECT * FROM tim_kerja WHERE id_team = " . $id);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data['id_team'] = 0;
        }
        $Q->free_result();
        return $data;
    }
}
