<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengukuran_model extends CI_Model {

    private $table = 'pengukuran';

    public function get_all() {
        $this->db->select('
            pengukuran.*,
            kunjungan.tgl_kunjungan,
            anak.name AS nama_anak
        ');
        $this->db->from('pengukuran');
        $this->db->join('kunjungan', 'kunjungan.id_kunjungan = pengukuran.kunjungan_id', 'left');
        $this->db->join('anak', 'anak.id_anak = kunjungan.anak_id', 'left');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_ukur' => $id])->row_array();
    }

   
    public function get_detail_by_id($id) {
        $this->db->select('
            pengukuran.*,
            kunjungan.tgl_kunjungan,
            anak.name AS nama_anak
        ');
        $this->db->from('pengukuran');
        $this->db->join('kunjungan', 'kunjungan.id_kunjungan = pengukuran.kunjungan_id', 'left');
        $this->db->join('anak', 'anak.id_anak = kunjungan.anak_id', 'left');
        $this->db->where('pengukuran.id_ukur', $id);
        return $this->db->get()->row_array();
    }

    public function tambah($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() > 0);
    }

    public function ubah($data, $id) {
        $this->db->where('id_ukur', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() >= 0);
    }

    public function hapus($id) {
        $this->db->where('id_ukur', $id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() > 0);
    }

    public function cetak_pengukuran_by_id($id)
{
    return $this->get_detail_by_id($id);
}

}
