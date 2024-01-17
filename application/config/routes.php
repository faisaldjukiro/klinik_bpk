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
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// login
$route['login'] = 'LoginController';
$route['auth'] = 'LoginController';
$route['auth/blocked'] = 'LoginController/blocked';
$route['registrasi'] = 'LoginController/registration';
$route['lupapassword'] = 'LoginController/forgotPassword';
// end login

// beranda
$route['beranda'] = 'BerandaController';
// end beranda

// settings
$route['profile'] = 'SettingController/profile';
$route['settings'] = 'SettingsController';
$route['settings/editmenu'] = 'SettingsController/editMenu';
$route['settings/hapusmenu'] = 'SettingsController/hapusMenu';
$route['settings/submenu'] = 'SettingsController/submenu';
$route['settings/editsubmenu'] = 'SettingsController/editSubmenu';
$route['settings/hapussubmenu'] = 'SettingsController/hapusSubmenu';
$route['settings/user'] = 'SettingsController/user';
$route['settings/role'] = 'SettingsController/role';
$route['settings/changeAccess'] = 'SettingsController/changeAccess';
$route['settings/roleaccess/(:any)'] = 'SettingsController/roleaccess/$1';
$route['settings/editrole'] = 'SettingsController/editRole';
$route['settings/hapusrole'] = 'SettingsController/hapusRole';
// settings

//master
$route['master/supplier'] = 'MasterController';
$route['master/supplier-tambah'] = 'MasterController/t_supplier';
$route['master/supplier-edit/(:any)'] = 'MasterController/e_supplier/$1';
$route['master/supplier-hapus'] = 'MasterController/h_supplier';
$route['master/satuan'] = 'MasterController/satuan';
$route['master/satuan-tambah'] = 'MasterController/t_satuan';
$route['master/satuan-edit/(:any)'] = 'MasterController/e_satuan/$1';
$route['master/satuan-hapus'] = 'MasterController/h_satuan';
$route['master/obat'] = 'MasterController/obat';
$route['master/obat-tambah'] = 'MasterController/t_obat';
$route['master/obat-edit/(:any)'] = 'MasterController/e_obat/$1';
$route['master/obat-hapus'] = 'MasterController/h_obat';
// $route['master/get_items_json'] = 'MasterController/get_items_json';
//end master

//pemeriksaan
$route['pemeriksaan'] = 'PemeriksaanController';
$route['pemeriksaan/resep'] = 'PemeriksaanController/resepObat';
$route['pemeriksaan/resephapus'] = 'PemeriksaanController/hapusResep';

// $route['pemeriksaan/resepTambah'] = 'PemeriksaanController/resepTambah';
$route['pemeriksaan/obat/getAjax/(:any)'] = 'PemeriksaanController/getAjax/$1';
$route['pemeriksaan/store'] = 'PemeriksaanController/store';
//end pemeriksaan

//transaksi
$route['transaksi/obat-masuk'] = 'TransaksiController';
$route['transaksi/obat-masuk-tambah'] = 'TransaksiController/t_obatMasuk';
$route['transaksi/obat-masuk-edit/(:any)'] = 'TransaksiController/e_obatMasuk/$1';
$route['transaksi/obat-keluar'] = 'TransaksiController/obatKeluar';
$route['transaksi/riwayat-obat'] = 'TransaksiController/riwayatObat';
$route['transaksi/export'] = 'TransaksiController/exportRiwayatt';


//end transaksi

//pegawai
$route['pegawai'] = 'PegawaiController';
$route['pegawai/tambah'] = 'PegawaiController/t_pegawai';

//end pegawai

//pagu
$route['pagu'] = 'PaguController';
$route['pagu/pergeserankurang'] = 'PaguController/kurangpergeseran';
$route['pagu/pergeserantambah'] = 'PaguController/tambahpergeseran';


//pagu

//get
$route['transaksi/getstok/(:any)'] = 'TransaksiController/getStok/$1';
$route['transaksi/getpagu/(:any)'] = 'TransaksiController/getPagu/$1';

//end get