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

Route::get('/gioi-thieu', function() {
    return 'Hello, first route giới thiệu!';
});

Route::get('/lien-he', function() {
    return 'Dia chi <h1>la....</h1>';
});

// Route chức năng Sản phẩm
Route::get('/admin/danhsachsanpham/print', 'Backend\SanPhamController@print')->name('danhsachsanpham.print');
Route::get('/admin/danhsachsanpham/excel', 'Backend\SanPhamController@excel')->name('danhsachsanpham.excel');
Route::get('/admin/danhsachsanpham/pdf', 'Backend\SanPhamController@pdf')->name('danhsachsanpham.pdf');
Route::resource('/admin/danhsachsanpham', 'Backend\SanPhamController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/activate/{nv_ma}', 'Backend\BackendController@activate')->name('activate');

// Route dành cho Frontend
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');
Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');
Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');