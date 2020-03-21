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
    return view('auth.login');
});
// Auth::routes();
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login2', 'AuthController@postlogin')->name('login2');
Route::get('/logout', 'AuthController@logout')->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('siswa', 'SiswaController');
    Route::get('/home', 'HomeController@index')->name('home');
});



