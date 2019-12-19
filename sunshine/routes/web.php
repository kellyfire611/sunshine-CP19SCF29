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
    return view('welcome');
});

Route::get('/gioi-thieu', function() {
    return 'Hello, first route giới thiệu!';
});

Route::get('/lien-he', function() {
    return 'Dia chi <h1>la....</h1>';
});

Route::get('/admin/danhsachsanpham/print', 'Backend\SanPhamController@print')->name('danhsachsanpham.print');
Route::get('/admin/danhsachsanpham/excel', 'Backend\SanPhamController@excel')->name('danhsachsanpham.excel');
Route::resource('/admin/danhsachsanpham', 'Backend\SanPhamController');
