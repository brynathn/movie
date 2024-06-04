<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function() {return view('home');});
//LOGIN//
Route::get('/login','LoginController@index');
Route::post('/login/process','LoginController@process_login');
Route::get('/logout','LoginController@process_logout');
//REGISTER//
Route::get('/register','RegisterController@index');
Route::post('/register/process','RegisterController@process_register');
//PROFILE//
Route::get('/profile/{username}','ProfileController@index');
Route::get('/profile/{username}/update','ProfileController@update');
Route::post('/profile/{username}/update/process','ProfileController@process_update');
Route::get('/profile/{username}/change-password','ProfileController@changepass');
Route::post('/profile/{username}/change-password/process','ProfileController@process_change');
Route::get('/profile/{username}/delete','ProfileController@delete');
// MANAGE POSTING//
Route::get('/manage','ManageShowController@index');
Route::get('/manage/create','ManageShowController@create');
Route::post('/manage/create/process','ManageShowController@process_create');
Route::get('/manage/update/{id}','ManageShowController@update');
Route::post('/manage/update/{id}/process','ManageShowController@process_update');
Route::get('/manage/delete/{id}&{foto}','ManageShowController@delete');

// BELI //
Route::get('/mytiket', 'PembelianController@mytiket')->name('mytiket'); //cust
Route::get('/penjualan', 'PembelianController@mytiket')->name('penjualan'); //admin
Route::post('/process_beli', 'PembelianController@process_beli')->name('process_beli');
Route::get('/beli/{id}/{judul}/{poster}/{harga}', 'PembelianController@showBeli')->name('beli.show');
Route::delete('/hapus_pembelian/{nik}', 'PembelianController@hapusPembelian')->name('hapus_pembelian');
Route::get('/penjualan', 'PembelianController@index')->name('penjualan');

// Inside routes/web.php
Route::get('/edit_pembelian/{nik}', 'PembelianController@editPembelian')->name('edit_pembelian');
Route::put('/update_pembelian/{nik}', 'PembelianController@updatePembelian')->name('update_pembelian');

// POSTING //
Route::get('/posting','ManageShowController@view');
Route::get('/','ManageShowController@home');