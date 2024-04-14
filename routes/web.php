<?php
use App\Http\Controllers\PageController;

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

Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSP'
]);

Route::get('chi-tiet/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChiTiet'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienHe'
]);

Route::get('thong-tin',[
    'as'=>'thongtin',
    'uses'=>'PageController@getThongTin'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);


Route::get('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@postLogin'
]);


Route::get('dang-ki',[
    'as'=>'register',
    'uses'=>'PageController@getRegister'
]);

Route::post('dang-ki',[
    'as'=>'register',
    'uses'=>'PageController@postRegister'
]);

Route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@postLogout'
]);





Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);