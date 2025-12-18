<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortu_model extends CI_Model {
    private $_table = "ortu";

    public function get_all() {
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }

    public function tambah($data) {
        $this->db->insert($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function get_by_id($id) {
        $query = $this->db->where('id_ortu', $id)
                          ->get($this->_table)
                          ->row_array();
        return $query; 
    }

   
    public function hapus($id) {
        $this->db->where('id_ortu', $id);
        $this->db->delete($this->_table);
        return ($this->db->affected_rows() != 1) ? false : true; 
    }

    public function ubah($data, $id) {
        $this->db->where('id_ortu', $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
