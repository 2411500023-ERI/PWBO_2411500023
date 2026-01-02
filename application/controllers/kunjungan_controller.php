<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->model('Anak_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['list_kunjungan'] = $this->Kunjungan_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kunjungan/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('anak_id', 'Nama Anak', 'required');
        $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'anak_id'       => $this->input->post('anak_id'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                'fasilitas'     => $this->input->post('fasilitas')
            ];

            $this->Kunjungan_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil ditambahkan</div>');
            redirect('kunjungan');
        }

        $data['list_anak'] = $this->Anak_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kunjungan/tambah_kunjungan', $data);
        $this->load->view('template/footer');
    }

    public function ubah($id) {
        $kunjungan = $this->Kunjungan_model->get_by_id($id);
        if (!$kunjungan) redirect('kunjungan');

        $this->form_validation->set_rules('anak_id', 'Nama Anak', 'required');
        $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $data = [
                'anak_id'       => $this->input->post('anak_id'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                'fasilitas'     => $this->input->post('fasilitas')
            ];

            $this->Kunjungan_model->ubah($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil diubah</div>');
            redirect('kunjungan');
        }

        $data['kunjungan'] = $kunjungan;
        $data['list_anak'] = $this->Anak_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kunjungan/ubah_kunjungan', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id) {
        $this->Kunjungan_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil dihapus</div>');
        redirect('kunjungan');
    }
}
