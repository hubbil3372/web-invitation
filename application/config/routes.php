<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Page/index';
$route['special/(:any)'] = 'Page/index/$1';
$route['404_override'] = 'Page/not_found_404';
$route['translate_uri_dashes'] = FALSE;

/* 
| -------------------------------------------------------------------------
| CUSTOM ROUTES
| -------------------------------------------------------------------------
*/

/**----------------------------------------------------
 * Auth
-------------------------------------------------------**/
$route['daftar'] = 'Auth/register';
$route['lupa-password'] = 'Auth/forgot_password';
$route['masuk'] = 'Auth/login';
$route['keluar'] = 'Auth/logout';
$route['reset-kata-sandi/(:any)'] = 'Auth/reset_password/$1';

$route['backoffice/data-diri'] = 'Auth/profile';
$route['backoffice/ganti-password'] = 'Auth/change_password';


/**----------------------------------------------------
 * Dasbor
-------------------------------------------------------**/
$route['backoffice/dasbor'] = 'backoffice/admin/Dasbor';

/**----------------------------------------------------
 * Menu Menejmen
-------------------------------------------------------**/
$route['backoffice/menu-manajemen'] = 'backoffice/admin/Menu';

/**----------------------------------------------------
 * Pengguna
-------------------------------------------------------**/
$route['backoffice/pengguna/tambah'] = 'Auth/create';
$route['backoffice/pengguna'] = 'Auth';
$route['backoffice/pengguna/(:any)/ubah'] = 'Auth/update/$1';
$route['backoffice/pengguna/(:any)/hapus'] = 'Auth/destroy/$1';

/**----------------------------------------------------
 * Grup
-------------------------------------------------------**/
$route['backoffice/grup/tambah'] = 'backoffice/admin/Grup/create';
$route['backoffice/grup'] = 'backoffice/admin/Grup';
$route['backoffice/grup/(:any)/ubah'] = 'backoffice/admin/Grup/update/$1';
$route['backoffice/grup/(:any)/hapus'] = 'backoffice/admin/Grup/destroy/$1';


/**----------------------------------------------------
 * Development
-------------------------------------------------------**/
$route['backoffice/example'] = 'backoffice/admin/Example';
$route['backoffice/example/pdf'] = 'backoffice/admin/Example/pdf';
$route['backoffice/example/export-excel'] = 'backoffice/admin/Example/export_excel';
$route['backoffice/example/import-excel'] = 'backoffice/admin/Example/import_excel';

// Contoh penambahan unit kerja
$route['backoffice/grup/example/(:any)'] = 'backoffice/admin/Grup/example/$1';
// Contoh penambahan unit kerja


/**----------------------------------------------------
 * Hak Akses
-------------------------------------------------------**/
$route['backoffice/hak-akses/tambah'] = 'backoffice/admin/Hak_akses/create';
$route['backoffice/hak-akses'] = 'backoffice/admin/Hak_akses';
$route['backoffice/hak-akses/(:any)/grup'] = 'backoffice/admin/Hak_akses/show/$1';
$route['backoffice/hak-akses/(:any)/ubah'] = 'backoffice/admin/Hak_akses/update/$1';
$route['backoffice/hak-akses/(:any)/hapus'] = 'backoffice/admin/Hak_akses/destroy/$1';

/**----------------------------------------------------
 * Aksi
-------------------------------------------------------**/
$route['backoffice/hak-akses/(:any)/grup/(:any)/menu/tambah'] = 'backoffice/admin/Aksi/create/$1/$2';
$route['backoffice/hak-akses/(:any)/grup/(:any)/menu/(:any)/menu-grup/ubah'] = 'backoffice/admin/Aksi/update/$1/$2/$3';
$route['backoffice/hak-akses/(:any)/grup/(:any)/menu-grup/hapus'] = 'backoffice/admin/Aksi/destroy/$1/$2';

/**----------------------------------------------------
 * Log
-------------------------------------------------------**/
$route['backoffice/log'] = 'backoffice/admin/Log';

/**----------------------------------------------------
 * Load Time
-------------------------------------------------------**/
$route['backoffice/load-time'] = 'backoffice/admin/Load_time';

/**----------------------------------------------------
 * Dokumentasi
-------------------------------------------------------**/
$route['backoffice/dokumentasi'] = 'backoffice/admin/Dokumentasi';

/**----------------------------------------------------
 * Undangan
-------------------------------------------------------**/
$route['backoffice/undangan/tambah'] = 'backoffice/admin/Undangan/create';
$route['backoffice/undangan'] = 'backoffice/admin/Undangan';
$route['backoffice/undangan/(:any)/ubah'] = 'backoffice/admin/Undangan/update/$1';
$route['backoffice/undangan/(:any)/hapus'] = 'backoffice/admin/Undangan/destroy/$1';


/**----------------------------------------------------
 * Undangan
-------------------------------------------------------**/
$route['backoffice/ucapan/tambah'] = 'backoffice/admin/Ucapan/create';
$route['backoffice/ucapan'] = 'backoffice/admin/Ucapan';
$route['backoffice/ucapan/(:any)/ubah'] = 'backoffice/admin/Ucapan/update/$1';
$route['backoffice/ucapan/(:any)/hapus'] = 'backoffice/admin/Ucapan/destroy/$1';

/**----------------------------------------------------
 * Grup
-------------------------------------------------------**/
$route['ucapan/tambah'] = 'ucapan/create';
$route['ucapan'] = 'ucapan';
$route['ucapan/(:any)/ubah'] = 'ucapan/update/$1';
$route['ucapan/(:any)/hapus'] = 'ucapan/destroy/$1';
