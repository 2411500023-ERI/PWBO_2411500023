<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

    private $table = 'kunjungan';

    public function get_all() {
        $this->db->select('
            kunjungan.*,
            anak.name AS nama_anak,
            ortu.name_ayah,
            ortu.name_ibu
        ');
        $this->db->from('kunjungan');
        $this->db->join('anak', 'kunjungan.anak_id = anak.id_anak', 'left');
        $this->db->join('ortu', 'anak.ortu_id = ortu.id_ortu', 'left');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        $this->db->select('
            kunjungan.*,
            anak.name AS nama_anak,
            ortu.name_ayah,
            ortu.name_ibu
        ');
        $this->db->from('kunjungan');
        $this->db->join('anak', 'kunjungan.anak_id = anak.id_anak', 'left');
        $this->db->join('ortu', 'anak.ortu_id = ortu.id_ortu', 'left');
        $this->db->where('kunjungan.id_kunjungan', $id);
        return $this->db->get()->row_array();
    }

    public function tambah($data) {
        return $this->db->insert($this->table, $data);
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

  public function laporan_periode($tgl_awal, $tgl_akhir)
{
    $this->db->select('
        kunjungan.*,
        anak.name AS nama_anak,
        ortu.name_ibu,
        ortu.name_ayah
    ');
    $this->db->from('kunjungan');
    $this->db->join('anak', 'anak.id_anak = kunjungan.anak_id', 'left');
    $this->db->join('ortu', 'ortu.id_ortu = anak.ortu_id', 'left');

   
    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $this->db->where('tgl_kunjungan >=', $tgl_awal);
        $this->db->where('tgl_kunjungan <=', $tgl_akhir);
    }

    return $this->db->get()->result_array();
  }

}
