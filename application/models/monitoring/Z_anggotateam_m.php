<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Z_anggotateam_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_teams($limit, $start)
    {
        $query = $this->db->order_by('z_anggotateam.id_zanggt', 'DESC')->select('*');
        $query = $this->db->from('z_anggotateam');
        $query = $this->db->join('tim_kerja', 'tim_kerja.id_team = z_anggotateam.id_team');
        $query = $this->db->join('bps', 'bps.KodeBPS = z_anggotateam.KodeBPS');
        $query = $this->db->join('z_periode', 'z_periode.id_zperiode = z_anggotateam.Id_Periode');
        $query = $this->db->where('ketua_tim =', 1);
        $query = $this->db->limit($limit, $start);
        $query = $this->db->get()->result_array();

        return $query;
    }


    public function list_anggota_team($id, $periode)
    {
        $data = array();
        $i = 0;
        // $Q = $this->db->query("SELECT `id_team`,`id_user`,`id_zperiode`,`nip`,`namaU`,`Tahun` FROM `z_anggotateam` A JOIN  `z_team` C ON A.id_team = C.id_zteam JOIN`userapp` B ON A.id_user = B.ida  JOIN `z_periode` D ON C.id_zperiode = D.id_zperiode WHERE A.id_team = $id  AND C.id_zperiode = $periode");
        $Q = $this->db->select('`id_team`, `id_user`, `z_team.id_zperiode`, `nip_lama`, `nama_peg`, `Tahun`,`id_ketuatim`');
        $Q = $this->db->from('z_anggotateam');
        $Q = $this->db->join('z_team', 'z_team.id_zteam = z_anggotateam.id_team');
        $Q = $this->db->join('pegawai', 'pegawai.id_pegawai = z_anggotateam.id_user');
        $Q = $this->db->join('z_periode', 'z_periode.id_zperiode = z_team.id_zperiode');
        $Q = $this->db->where('z_anggotateam.id_team', $id);
        $Q = $this->db->where('z_team.id_zperiode', $periode);
        $Q = $this->db->get();

        // var_dump($Q);

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
                $i++;
            }
        }

        $Q->free_result();
        return $data;
    }

    public function add_teams($iduser, $tim)
    {

        $data = array(
            'id_team' => $tim,
            'id_user' => $iduser
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

    public function hapus_tim_kerja($team, $bps, $periode)
    {
        $this->db->where('id_team', $team);
        $this->db->where('kodeBPS', $bps);
        $this->db->where('Id_Periode', $periode);
        $this->db->delete('z_anggotateam');
    }
}
