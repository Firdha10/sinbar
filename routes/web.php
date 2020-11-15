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

// Route::get('/', function () {
//     return view('welcome');
// });
 

Route::get('/','LoginController@index')->name('login');
Route::post('/login','LoginController@post_login')->name('do_login') ;
Route::get('/logout','UserController@logout')->name('logout');


Route::group(['middleware'=>'auth'],function(){
	Route::get('/user','UserController@index')->name('user.index') ;
	Route::resource('barang', 'BarangController');
	Route::resource('supplier', 'SuplierController');
	Route::resource('barangmasuk', 'MasukController');
	Route::resource('barangkeluar', 'KeluarController');
	Route::post('/barang/cari','BarangController@search')->name('barang.cari_barang');
	Route::post('/suplier/cari','SuplierController@search')->name('supplier.search_suplier');
	Route::post('/masuk/cari','MasukController@search')->name('barangmasuk.cari_masuk');
	Route::post('/keluar/cari','KeluarController@search')->name('barangkeluar.cari_keluar');

});
