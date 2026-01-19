<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pengukuran_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pengukuran_model'); 
    }

   public function index()
{
    $tgl_awal  = $this->input->get('tgl_awal');
    $tgl_akhir = $this->input->get('tgl_akhir');

    if ($tgl_awal && $tgl_akhir) {
        $data['list_pengukuran'] =
            $this->pengukuran_model->filter_tanggal($tgl_awal, $tgl_akhir);
    } else {
        $data['list_pengukuran'] = [];
    }

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('pengukuran/laporan_pengukuran', $data);
    $this->load->view('template/footer');
}

    public function filter()
    {
        $tgl_awal  = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['list_pengukuran'] =
        $this->pengukuran_model->filter_tanggal($tgl_awal, $tgl_akhir);

        $data['tgl_awal']  = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('laporan_pengukuran/index', $data);
        $this->load->view('template/footer');
    }

    public function download_pdf()
    {
        $tgl_awal  = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data = $this->pengukuran_model
            ->filter_tanggal($tgl_awal, $tgl_akhir);

        $this->load->library('Fpdf_gen');
        $pdf = new Fpdf_gen('L');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,10,'LAPORAN PENGUKURAN',0,1,'C');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,8,'No',1);
        $pdf->Cell(40,8,'Nama Anak',1);
        $pdf->Cell(25,8,'BB',1);
        $pdf->Cell(25,8,'TB',1);
        $pdf->Cell(25,8,'LK',1);
        $pdf->Cell(35,8,'Tgl Ukur',1);
        $pdf->Cell(40,8,'Status Gizi',1);
        $pdf->Ln();

        $pdf->SetFont('Arial','',10);
        $no = 1;
        foreach ($data as $row) {
            $pdf->Cell(10,8,$no++,1);
            $pdf->Cell(40,8,$row['nama_anak'],1);
            $pdf->Cell(25,8,$row['bb'],1);
            $pdf->Cell(25,8,$row['tb'],1);
            $pdf->Cell(25,8,$row['lk'],1);
            $pdf->Cell(35,8,$row['tgl_ukur'],1);
            $pdf->Cell(40,8,$row['status_gizi'],1);
            $pdf->Ln();
        }

        $pdf->Output('D','laporan_pengukuran.pdf');
    }
}
