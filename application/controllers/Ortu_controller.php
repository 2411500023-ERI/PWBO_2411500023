<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortu_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ortu_model'); // Huruf O besar sesuai nama file
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Tampil semua data ortu
    public function index() {
        $data['list_ortu'] = $this->Ortu_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ortu/index', $data);
        $this->load->view('template/footer');
    }

    // Tambah data ortu
    public function tambah_ortu() {
        $this->form_validation->set_rules('ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('ortu/tambah_ortu');
            $this->load->view('template/footer');
        } else {
            $this->_simpan_ortu();
        }
    }

    private function _simpan_ortu() {
        $data = [
            'name_ibu'  => $this->input->post('ibu'),
            'name_ayah' => $this->input->post('ayah'),
            'hubungan'  => $this->input->post('hubungan'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat'),
            'create_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->Ortu_model->tambah($data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil ditambahkan</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal ditambahkan</div>');
        }

        redirect('ortu');
    }

    // Hapus data ortu
    public function hapus_ortu($id) {
        $ortu = $this->Ortu_model->get_by_id($id);
        if ($ortu) {
            if ($this->Ortu_model->hapus($id)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil dihapus</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal dihapus</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data ortu tidak ditemukan</div>');
        }
        redirect('ortu');
    }

    // Ubah data ortu
    public function ubah_ortu($id) {
        $ortu = $this->Ortu_model->get_by_id($id);
        if ($ortu) {
            $this->form_validation->set_rules('ibu', 'Nama Ibu', 'required');
            $this->form_validation->set_rules('ayah', 'Nama Ayah', 'required');

            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_ortu($id);
            } else {
                $data['ortu'] = $ortu;
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('ortu/ubah_ortu', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data ortu tidak ditemukan</div>');
            redirect('ortu');
        }
    }

    private function __ubah_ortu($id) {
        $data = [
            'name_ibu'  => $this->input->post('ibu'),
            'name_ayah' => $this->input->post('ayah'),
            'hubungan'  => $this->input->post('hubungan'),
            'telp'      => $this->input->post('telp'),
            'alamat'    => $this->input->post('alamat'),
            'create_at' => date('Y-m-d H:i:s'),
        ];

        $ubah = $this->Ortu_model->ubah($data, $id);

        if ($ubah) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil diubah</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal diubah</div>');
        }
        redirect('ortu');
    }
}
