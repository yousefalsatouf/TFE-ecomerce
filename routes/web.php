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
    return view('/front/home');
});

Route::get('/shop', function () {
    return view('front/shop');
});

Route::get('/products', function () {
    return view('front/shop');
});

Route::get('/about', function () {
    return view('front/about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
