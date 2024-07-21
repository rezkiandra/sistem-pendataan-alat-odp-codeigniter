<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['profile'] = 'Profile/index';

//user & login
$route['teknisi'] = 'Teknisi/index';
$route['user'] = 'User/index';
$route['login'] = 'Login/index';

//master
$route['pt2'] = 'pt2/index';
$route['odp'] = 'odp/index';
$route['odps'] = 'odps/index';

//laporan
$route['laporan'] = 'laporan/index';


$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;
