<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BPS_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list_bps()
    {
        $data = array();
        $i = 0;

        $Q = $this->db->query("SELECT * FROM bps");

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function show_bps($id)
    {
        $data = array();
        $Q = $this->db->query("SELECT * FROM bps WHERE kodeBPS = " . $id);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        } else {
            $data['kodeBPS'] = 0;
        }
        $Q->free_result();
        return $data;
    }
}
