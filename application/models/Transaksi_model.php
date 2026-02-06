<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $table = 'transaksi';

    
    public function get_all()
    {
        $this->db->select('
            transaksi.*,
            kunjungan.tgl_kunjungan,
            kunjungan.fasilitas,
            anak.nama_anak
        ');
        $this->db->from($this->table);
        $this->db->join('kunjungan', 'kunjungan.id_kunjungan = transaksi.kunjungan_id');
        $this->db->join('anak', 'anak.id_anak = kunjungan.anak_id');

        return $this->db->get()->result_array();
    }

   
    public function get_kunjungan()
    {
        $this->db->select('
            kunjungan.id_kunjungan,
            kunjungan.tgl_kunjungan,
            anak.nama_anak
        ');
        $this->db->from('kunjungan');
        $this->db->join('anak', 'anak.id_anak = kunjungan.anak_id');

        return $this->db->get()->result_array();
    }

    
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_by_id($id)
    {
        $this->db->select('
            transaksi.*,
            kunjungan.anak_id
        ');
        $this->db->from($this->table);
        $this->db->join('kunjungan', 'kunjungan.id_kunjungan = transaksi.kunjungan_id');
        $this->db->where('transaksi.id_transaksi', $id);

        return $this->db->get()->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_transaksi', $id);
        return $this->db->delete($this->table);
    }
}
