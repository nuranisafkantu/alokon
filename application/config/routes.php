<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = 'NotFound';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth';
$route['login_proses'] = 'auth/proses';
$route['logout'] = 'auth/logout';

// Data Alkon 
$route['alkon_masuk'] = 'alkon_masuk';
$route['alkon_masuk_proses'] = 'alkon_masuk/proses';
$route['alkon_masuk_delete/(:any)'] = 'alkon_masuk/delete/$1';

$route['alkon_keluar'] = 'alkon_keluar';
$route['alkon_keluar_proses'] = 'alkon_keluar/proses';
$route['alkon_keluar_delete/(:any)'] = 'alkon_keluar/delete/$1';

$route['alkon_kadaluarsa'] = 'alkon_kadaluarsa';

// master data 
$route['user'] = 'user';
$route['user_proses'] = 'user/proses';
// $route['user/(:any)'] = 'user/show/$1';
// $route['user_update/(:any)'] = 'user/update/$1';
$route['user_reset/(:any)'] = 'user/reset/$1';
$route['user_delete/(:any)'] = 'user/delete/$1';

$route['jns_alkon'] = 'jns_alkon';
$route['jns_alkon_proses'] = 'jns_alkon/proses';
$route['jns_alkon/(:any)'] = 'jns_alkon/show/$1';
$route['jns_alkon_update/(:any)'] = 'jns_alkon/update/$1';
$route['jns_alkon_delete/(:any)'] = 'jns_alkon/delete/$1';

$route['alkon'] = 'alkon';
$route['alkon_proses'] = 'alkon/proses';
$route['alkon_show/(:any)'] = 'alkon/show/$1';
$route['alkon_update/(:any)'] = 'alkon/update/$1';
$route['alkon_delete/(:any)'] = 'alkon/delete/$1';

$route['faskes'] = 'faskes';
$route['faskes_proses'] = 'faskes/proses';
$route['faskes_show/(:any)'] = 'faskes/show/$1';
$route['faskes_update/(:any)'] = 'faskes/update/$1';
$route['faskes_delete/(:any)'] = 'faskes/delete/$1';

$route['supplier'] = 'supplier';
$route['supplier_proses'] = 'supplier/proses';
$route['supplier_show/(:any)'] = 'supplier/show/$1';
$route['supplier_update/(:any)'] = 'supplier/update/$1';
$route['supplier_delete/(:any)'] = 'supplier/delete/$1';

// Laporan Data Alkon 
$route['laporan_masuk'] = 'laporan/masuk';
$route['laporan_masuk_export'] = 'laporan/masuk_export';

$route['laporan_keluar'] = 'laporan/keluar';
$route['laporan_keluar_export'] = 'laporan/keluar_export';

$route['laporan_kadaluarsa'] = 'laporan/kadaluarsa';
$route['laporan_kadaluarsa_export'] = 'laporan/kadaluarsa_export';
