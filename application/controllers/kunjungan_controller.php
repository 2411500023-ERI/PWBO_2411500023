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

   public function cetak_kunjungan($id) {
    $data['kunjungan'] = $this->Kunjungan_model->get_by_id($id);

    $this->load->view('template/header');
    $this->load->view('kunjungan/cetak_kunjungan', $data); 
    $this->load->view('template/footer');
}
  public function download_pdf($id) {
    $kunjungan = $this->Kunjungan_model->get_by_id($id);

    if (!$kunjungan) {
        $this->session->set_flashdata('message', 'Data kunjungan tidak ditemukan');
        redirect('kunjungan');
    }

    $this->load->library('Fpdf_gen');

    $pdf = new Fpdf_gen();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'DATA KUNJUNGAN',0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',12);

    $pdf->Cell(50,10,'Nama Anak',0,0);
    $pdf->Cell(0,10,': '.$kunjungan['nama_anak'],0,1);

    $pdf->Cell(50,10,'Nama Ayah',0,0);
    $pdf->Cell(0,10,': '.$kunjungan['name_ayah'],0,1);

    $pdf->Cell(50,10,'Nama Ibu',0,0);
    $pdf->Cell(0,10,': '.$kunjungan['name_ibu'],0,1);

    $pdf->Cell(50,10,'Tgl Kunjungan',0,0);
    $pdf->Cell(0,10,': '.$kunjungan['tgl_kunjungan'],0,1);

    $pdf->Cell(50,10,'Fasilitas',0,0);
    $pdf->Cell(0,10,': '.$kunjungan['fasilitas'],0,1);

    $pdf->Output('D', 'data_kunjungan_'.$kunjungan['id_kunjungan'].'.pdf');
}

}


