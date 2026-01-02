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

    // === TAMBAHAN UNTUK TUGAS ===

    public function get_by_id($id) {
        return $this->db
            ->where('id_anak', $id)
            ->get($this->_table)
            ->row_array();
    }

    public function hapus($id) {
        $this->db->where('id_anak', $id);
        return $this->db->delete($this->_table);
    }

    public function ubah($data, $id) {
        $this->db->where('id_anak', $id);
        return $this->db->update($this->_table, $data);
    }
}
