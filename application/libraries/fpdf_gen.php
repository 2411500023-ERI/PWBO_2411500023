<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Panggil file fpdf.php dari folder third_party
require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Fpdf_gen extends fpdf {
    // Bisa ditambah fungsi custom jika perlu
}
