<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['beranda'] = 'Beranda';

/* setting */
$route['setting'] = 'Setting';
$route['setting/update'] = 'Setting/update';

/* penanganan jalan */
$route['penanganan'] = 'Penanganan';
$route['penanganan/create'] = 'Penanganan/create';
$route['penanganan/edit/(:num)'] = 'Penanganan/edit/$1';
$route['penanganan/detail/(:num)'] = 'Penanganan/detail/$1';

/* kondisi jalan */

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
