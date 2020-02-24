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
    return view('/front/shop');
});

Route::get('/products', function () {
    return view('/front/products');
});

Route::get('/about', function () {
    return view('front/about');
});

Route::get('/contact', function () {
    return view('front/contact');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');
        Route::resource('product', 'ProductsController');
    });
