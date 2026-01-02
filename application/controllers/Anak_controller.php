<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Anak_model');
        $this->load->model('Ortu_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['list_anak'] = $this->Anak_model->get_all();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('anak/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_anak() {
        $this->form_validation->set_rules('ortu_id', 'Orang Tua', 'required');
        $this->form_validation->set_rules('anak', 'Nama Anak', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['list_ortu'] = $this->Ortu_model->get_all();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('anak/tambah_anak', $data);
            $this->load->view('template/footer');
        } else {
            $this->_simpan_anak();
        }
    }

    private function _simpan_anak() {
        $data = [
            'ortu_id'   => $this->input->post('ortu_id'),
            'name'      => $this->input->post('anak'),
            'nik'       => $this->input->post('nik'),
            'jk'        => $this->input->post('jk'),
            'bb_lahir'  => $this->input->post('bb_lahir'),
            'tb_lahir'  => $this->input->post('tb_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'goldar'    => $this->input->post('goldar'),
            'create_at' => date('Y-m-d H:i:s'),
        ];

        $this->Anak_model->tambah($data);
        redirect('anak');
    }

   
    public function hapus_anak($id) {
        $anak = $this->Anak_model->get_by_id($id);

        if ($anak) {
            $this->Anak_model->hapus($id);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">Data anak berhasil dihapus</div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning">Data anak tidak ditemukan</div>'
            );
        }

        redirect('anak');
    }

    public function ubah_anak($id) {
        $anak = $this->Anak_model->get_by_id($id);

        if ($anak) {
            $this->form_validation->set_rules('ortu_id', 'Orang Tua', 'required');
            $this->form_validation->set_rules('anak', 'Nama Anak', 'required');

            if ($this->form_validation->run() !== FALSE) {
                $this->__ubah_anak($id);
            } else {
                $data['anak'] = $anak;
                $data['list_ortu'] = $this->Ortu_model->get_all();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('anak/ubah_anak', $data);
                $this->load->view('template/footer');
            }
        } else {
            redirect('anak');
        }
    }

    private function __ubah_anak($id) {
        $data = [
            'ortu_id'   => $this->input->post('ortu_id'),
            'name'      => $this->input->post('anak'),
            'nik'       => $this->input->post('nik'),
            'jk'        => $this->input->post('jk'),
            'bb_lahir'  => $this->input->post('bb_lahir'),
            'tb_lahir'  => $this->input->post('tb_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'goldar'    => $this->input->post('goldar'),
        ];

        $this->Anak_model->ubah($data, $id);
        redirect('anak');
    }
}
