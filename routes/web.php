<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('data', 'DaftarController');
Route::resource('siswa', 'SiswaController');
Route::resource('dudi', 'DudiController');
Route::resource('jurusan', 'JurusanController');
Route::resource('apply', 'PengajuanController');
Route::resource('bookmark', 'BookmarkController');
Route::resource('admin', 'AdminController');

Route::get('/dudi/index/{id}', 'DudiController@showIndex');
Route::get('/data/siswa/data-application', 'SiswaController@dataIndex');
Route::get('/data/dudi/data-resume', 'DudiController@dataResume');
Route::get('/data/dudi/edit-account', 'DudiController@dataAccount');
Route::get('/data/dudi/list-application', 'DudiController@dataListApply');
Route::get('/data/dudi/all-application/{id}', 'DudiController@dataApply');
Route::get('/data/siswa/bookmark', 'BookmarkController@index');
Route::get('/data/siswa/notification', 'NotificationController@index');
Route::get('search', 'DudiController@search');
Route::get('search-in-jurusan', 'JurusanController@search');

// Admin Route
Route::get('/admin/data/data-siswa', 'AdminController@dataSiswa');
Route::get('/admin/data/data-jurusan', 'AdminController@dataJurusan');
Route::get('/admin/data/data-confirm-jurusan', 'AdminController@dataConfirmJurusan');
Route::get('/admin/data/data-dudi', 'AdminController@dataDudi');

Route::get('getDudiJson', 'AdminController@getDudiJson');
Route::get('getSiswaJson', 'AdminController@getSiswaJson');
Route::get('/contact', 'HomeController@contact');