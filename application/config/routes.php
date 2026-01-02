<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['login/process'] = 'auth/process';
$route['logout'] = 'auth/logout';

// Data Ortu Admin
$route['ortu'] = 'ortu_controller/index';
$route['ortu/tambah'] = 'ortu_controller/tambah_ortu';
$route['ortu/hapus/(:num)'] = 'ortu_controller/hapus_ortu/$1';
$route['ortu/ubah/(:num)'] = 'ortu_controller/ubah_ortu/$1';

//Data Anak admin
$route['anak'] = 'anak_controller/index';
$route['anak/tambah'] = 'anak_controller/tambah_anak';
$route['anak/hapus/(:num)'] = 'anak_controller/hapus_anak/$1';
$route['anak/ubah/(:num)'] = 'anak_controller/ubah_anak/$1';
$route['anak/tambah_anak'] = 'anak_controller/tambah_anak';

//Data Kunjungan admin
$route['kunjungan'] = 'kunjungan_controller/index';
$route['kunjungan/tambah'] = 'kunjungan_controller/tambah';
$route['kunjungan/ubah/(:num)'] = 'kunjungan_controller/ubah/$1';
$route['kunjungan/hapus/(:num)'] = 'kunjungan_controller/hapus/$1';

//Data Pengukuran admin
$route['pengukuran'] = 'pengukuran_controller/index';
$route['pengukuran/tambah'] = 'pengukuran_controller/tambah';
$route['pengukuran/ubah/(:num)'] = 'pengukuran_controller/ubah/$1';
$route['pengukuran/hapus/(:num)'] = 'pengukuran_controller/hapus/$1';
