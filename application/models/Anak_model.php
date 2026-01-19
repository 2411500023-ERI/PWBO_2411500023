<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak_model extends CI_Model {

    private $_table = "anak";

    public function get_all() {
        $this->db->select('
            anak.*,
            ortu.name_ibu,
            ortu.name_ayah
        ');
        $this->db->from('anak');
        $this->db->join('ortu', 'anak.ortu_id = ortu.id_ortu', 'left');
        return $this->db->get()->result_array();
    }

    public function tambah($data) {
        $this->db->insert($this->_table, $data);
        return ($this->db->affected_rows() == 1);
    }

   

    public function get_by_id($id) {
       $this->db->select('
            anak.*,
            ortu.name_ibu,
            ortu.name_ayah
        ');
        $this->db->from('anak');
        $this->db->join('ortu', 'anak.ortu_id = ortu.id_ortu', 'left');
        $this->db->where('anak.id_anak', $id);
        return $this->db->get()->row_array();
    }

    public function hapus($id) {
        $this->db->where('id_anak', $id);
        return $this->db->delete($this->_table);
    }

    public function ubah($data, $id) {
        $this->db->where('id_anak', $id);
        return $this->db->update($this->_table, $data);
    }

     public function cetak_anak_all() {
        return $this->get_all();
    }

    public function cetak_anak_by_id($id) {
        return $this->get_by_id($id);
    }
}
