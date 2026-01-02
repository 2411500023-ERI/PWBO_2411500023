<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

    private $table = 'kunjungan';

    public function get_all() {
        $this->db->select('
            kunjungan.*,
            anak.name AS nama_anak,
            ortu.name_ibu,
            ortu.name_ayah
        ');
        $this->db->from('kunjungan');
        $this->db->join('anak', 'kunjungan.anak_id = anak.id_anak', 'left');
        $this->db->join('ortu', 'anak.ortu_id = ortu.id_ortu', 'left');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        return $this->db
            ->where('id_kunjungan', $id)
            ->get($this->table)
            ->row_array();
    }

    public function tambah($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() == 1);
    }

    public function ubah($data, $id) {
        $this->db->where('id_kunjungan', $id);
        return $this->db->update($this->table, $data);
    }

    public function hapus($id) {
        return $this->db
            ->where('id_kunjungan', $id)
            ->delete($this->table);
    }
}
