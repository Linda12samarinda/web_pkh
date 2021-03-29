<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::resource('bpnts', 'BpntController');

Route::resource('kecamatans', 'KecamatanController');

Route::resource('kelurahans', 'KelurahanController');

Route::resource('rts', 'RtController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('kategoris', 'KategoriController');

Route::get('/directions/{id}', 'BpntController@directions')->name('bpnt.directions');