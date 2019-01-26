<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    private $tabel_v = 'vuser';
    private $tabel_v2 = 'vusers';

    public function _cari()
    {
        $mencari = $this->input->get_post('mencari');
        $gender  = $this->input->get_post('gender');
        if ($mencari != null) {
            $this->db->like('nama', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->or_like('email', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->or_like('type_name', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
        }else{
        	if ($gender != null) {
                $this->db->where('gender', $gender);
            }
        }
    }

    public function _cari2($where)
    {
        $mencari = $this->input->get_post('mencari');
        $gender  = $this->input->get_post('gender');
        if ($mencari != null) {
            $this->db->like('nama', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->where($where);
            $this->db->or_like('email', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->where($where);
            $this->db->or_like('type_name', $mencari);
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->where($where);
        }else{
            if ($gender != null) {
                $this->db->where('gender', $gender);
            }
            $this->db->where($where);
        }
    }

    public function datanya($limit = null)
    {
        $this->_cari();
        if ($limit != null) {
            $this->db->limit($limit);
        }
        return $this->db->get($this->tabel_v);
    }

    public function datanya2($groupBy)
    {
        $this->_cari();
        if ($groupBy != null) {
            $this->db->group_by($groupBy);
        }
        return $this->db->get($this->tabel_v2);
    }

    public function datanya3($where)
    {
        $this->_cari2($where);
        return $this->db->get($this->tabel_v2);
    }
}

/* End of file Mod_user.php */
/* Location: ./application/models/custom/Mod_user.php */
