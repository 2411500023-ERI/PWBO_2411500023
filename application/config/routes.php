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

