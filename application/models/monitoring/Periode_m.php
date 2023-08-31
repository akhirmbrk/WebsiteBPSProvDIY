<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Periode_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_periode()
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT * FROM z_periode ORDER BY Tahun ASC");

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
