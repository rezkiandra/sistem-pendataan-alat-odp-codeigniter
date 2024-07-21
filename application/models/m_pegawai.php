<?php

class M_pegawai extends CI_Model
{
    public function get_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'Pegawai');

        return $this->db->get();
    }
}
