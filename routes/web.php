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

<<<<<<< HEAD
Route::group(['middleware' => 'auth'], function () {
    Route::resource('siswa', 'SiswaController');
    Route::get('/admin', 'HomeController@index')->name('home');
});
=======

Route::resource('siswa', 'SiswaController');
Route::post('/siswa/gantipass', 'SiswaController@gantiPass')->name('siswa.gantipass');
Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> 6136d4e15f009e7c1d5c5a2682bdcef0d9a375c4

Route::resource('/guru','GuruController');
Route::resource('/kelas','GuruController');
Route::resource('/letrasi-guru','LetrasiGuruController');
Route::resource('/letrasi-siswa','LetrasiSiswaController');



