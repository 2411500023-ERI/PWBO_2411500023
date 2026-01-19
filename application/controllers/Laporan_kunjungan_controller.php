<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kunjungan_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->library('session');
    }

    
    public function index()
{
    $tgl_awal  = $this->input->get('tgl_awal');
    $tgl_akhir = $this->input->get('tgl_akhir');

    $data['list_kunjungan'] = [];

    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $data['list_kunjungan'] =
            $this->Kunjungan_model->laporan_periode($tgl_awal, $tgl_akhir);
    }

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('kunjungan/laporan_kunjungan', $data);
    $this->load->view('template/footer');
}


  
    public function download_pdf()
    {
        $tgl_awal  = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        if (!$tgl_awal || !$tgl_akhir) {
            redirect('laporan_kunjungan');
        }

        $data = $this->Kunjungan_model->laporan_periode($tgl_awal, $tgl_akhir);

        $this->load->library('Fpdf_gen');
        $pdf = new Fpdf_gen();
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,10,'LAPORAN KUNJUNGAN',0,1,'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Cell(0,8,'Periode: '.date('d-m-Y', strtotime($tgl_awal)).' s/d '.date('d-m-Y', strtotime($tgl_akhir)),0,1);
        $pdf->Ln(5);

      
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,8,'No',1);
        $pdf->Cell(50,8,'Nama Anak',1);
        $pdf->Cell(40,8,'Tgl Kunjungan',1);
        $pdf->Cell(90,8,'Keluhan',1);
        $pdf->Ln();

       
        $pdf->SetFont('Arial','',10);
        $no = 1;
        foreach ($data as $row) {
            $pdf->Cell(10,8,$no++,1);
            $pdf->Cell(50,8,$row->nama_anak,1);
            $pdf->Cell(40,8,date('d-m-Y', strtotime($row->tgl_kunjungan)),1);
            $pdf->Cell(90,8,$row->keluhan,1);
            $pdf->Ln();
        }

        $pdf->Output('D','laporan_kunjungan.pdf');
    }
}
