<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengukuran_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengukuran_model');
        $this->load->model('Kunjungan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['list_pengukuran'] = $this->Pengukuran_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pengukuran/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('kunjungan_id', 'Kunjungan', 'required');
        $this->form_validation->set_rules('tgl_ukur', 'Tanggal Ukur', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['list_kunjungan'] = $this->Kunjungan_model->get_all();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('pengukuran/tambah_pengukuran', $data);
            $this->load->view('template/footer');
        } else {
            $this->_simpan_pengukuran();
        }
    }

    private function _simpan_pengukuran() {
        $data = [
            'kunjungan_id' => $this->input->post('kunjungan_id'),
            'tgl_ukur'     => $this->input->post('tgl_ukur'),
            'bb'           => $this->input->post('bb'),
            'tb'           => $this->input->post('tb'),
            'lk'           => $this->input->post('lk'),
            'vaksin'       => $this->input->post('vaksin'),
            'status_gizi'  => $this->input->post('status_gizi'),
        ];

        $this->Pengukuran_model->tambah($data);
        redirect('pengukuran');
    }

    public function hapus($id) {
        $ukur = $this->Pengukuran_model->get_by_id($id);

        if ($ukur) {
            $this->Pengukuran_model->hapus($id);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">Data pengukuran berhasil dihapus</div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">Data pengukuran tidak ditemukan</div>'
            );
        }

        redirect('pengukuran');
    }

    public function ubah($id) {
        // Ambil detail pengukuran termasuk Nama Anak & Tanggal Kunjungan
        $ukur = $this->Pengukuran_model->get_detail_by_id($id);

        if ($ukur) {
            $this->form_validation->set_rules('tgl_ukur', 'Tanggal Ukur', 'required');

            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_pengukuran($id);
            } else {
                $data['ukur'] = $ukur;
                $data['list_kunjungan'] = $this->Kunjungan_model->get_all();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('pengukuran/ubah_pengukuran', $data);
                $this->load->view('template/footer');
            }
        } else {
            redirect('pengukuran');
        }
    }

    private function __ubah_pengukuran($id) {
        // Tambahkan kunjungan_id supaya Nama Anak & Tanggal Kunjungan bisa berubah
        $data = [
            'kunjungan_id' => $this->input->post('kunjungan_id'), // <-- penting!
            'tgl_ukur'     => $this->input->post('tgl_ukur'),
            'bb'           => $this->input->post('bb'),
            'tb'           => $this->input->post('tb'),
            'lk'           => $this->input->post('lk'),
            'vaksin'       => $this->input->post('vaksin'),
            'status_gizi'  => $this->input->post('status_gizi'),
        ];

        $this->Pengukuran_model->ubah($data, $id);
        redirect('pengukuran');
    }
}
