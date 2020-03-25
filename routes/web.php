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
    if (session('akses')=='admin') {
        return redirect('/home');
    }elseif (session('akses')=='guru') {
        return redirect('/guru');
    }elseif (session('akses')=='siswa') {
        return redirect('/siswa');
    }else {
        return view('auth.login');
    }
    
});
// Auth::routes();
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login2', 'AuthController@postlogin')->name('login2');
Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('siswa', 'SiswaController');
Route::post('/siswa/gantipass', 'SiswaController@gantiPass')->name('siswa.gantipass');

Route::resource('/guru','GuruController');
Route::post('/guru/gantipass', 'GuruController@gantiPass')->name('guru.gantipass');

Route::resource('/kelas','KelasController');

Route::resource('/Literasi-siswa','LiterasiSiswaController');
Route::resource('/Literasi-admin','LiterasiAdminController');


