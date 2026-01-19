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

 public function download_pdf($id) {

    // ambil data pengukuran + join anak & kunjungan
    $ukur = $this->Pengukuran_model->get_detail_by_id($id);

    if (!$ukur) {
        $this->session->set_flashdata('message', 'Data pengukuran tidak ditemukan');
        redirect('pengukuran');
    }

    

    $this->load->library('Fpdf_gen');

    $pdf = new Fpdf_gen();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'DATA KUNJUNGAN',0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',12);

     $pdf->Cell(50,10,'Nama Anak',0,0);
    $pdf->Cell(0,10,': '.$ukur['nama_anak'],0,1);

     $pdf->Cell(50,10,'Tgl Kunjungan',0,0);
    $pdf->Cell(0,10,': '.$ukur['tgl_kunjungan'],0,1);

    $pdf->Cell(50,10,'Tgl Ukur',0,0);
    $pdf->Cell(0,10,': '.$ukur['tgl_ukur'],0,1);

    $pdf->Cell(50,10,'BB',0,0);
    $pdf->Cell(0,10,': '.$ukur['bb'],0,1);

    $pdf->Cell(50,10,'TB',0,0);
    $pdf->Cell(0,10,': '.$ukur['tb'],0,1);

    $pdf->Cell(50,10,'LK',0,0);
    $pdf->Cell(0,10,': '.$ukur['lk'],0,1);

    $pdf->Cell(50,10,'Status Gizi',0,0);
    $pdf->Cell(0,10,': '.$ukur['status_gizi'],0,1);

    $pdf->Output('D', 'data_pengukuran_'.$ukur['id_ukur'].'.pdf');
  }

  public function cetak_pengukuran($id)
{
    $ukur = $this->Pengukuran_model->get_detail_by_id($id);

    if (!$ukur) {
        redirect('pengukuran');
    }

    $data['ukur'] = $ukur;

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pengukuran/cetak_pengukuran', $data);
    $this->load->view('template/footer');
}

}
