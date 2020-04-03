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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('/front/home');
});

Route::get('/shop', function () {
    return view('/front/shop');
});

Route::get('/about', function () {
    return view('front/about');
});

Route::get('/contact', function () {
    return view('front/contact');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/shop', 'HomeController@shop');
Route::get('/product_details/{id}', 'HomeController@product_details');
Route::get('/category/list/{name}', 'CategoriesController@list');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/removeItem/{id}', 'CartController@removeItem');
Route::put('/cart/updateItem/{id}', 'CartController@updateItem');

Route::get('/wishlist', 'HomeController@view_wishlist');
Route::post('addToWishList', 'HomeController@wishlist')->name('addToWishList');
Route::get('/removeFromWishlist/{id}', 'HomeController@remove_from_wishlist');

Route::post('/addReview', 'HomeController@addReview');

Route::post('/search', 'HomeController@search');
Route::post('/advancedSearch', 'ShopController@advancedSearch');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');
        Route::POST('/admin/store', 'AdminController@store');
        Route::get('/admin', 'AdminController@index');
        Route::resource('products', 'ProductsController');
        Route::resource('categories','CategoriesController');
        Route::get('editProductForm/{id}', 'ProductsController@editProductForm')->name('editProductForm');
        Route::post('editProduct/{id}', 'ProductsController@editProduct')->name('editProduct');
        Route::get('editImage/{id}', 'ProductsController@editImage')->name('editImage');
        Route::post('editProductImage', 'ProductsController@editProductImage')->name('editProductImage');
        Route::get('/addProperty/{id}', 'ProductsController@addProperty')->name('addProperty');
        Route::post('/submitProperty', 'ProductsController@submitProperty')->name('submitProperty');
        Route::post('/editProperty', 'ProductsController@editProperty');
    }
);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/formValidate', 'CheckoutController@formValidate');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@address');
    Route::post('/updateAddress', 'ProfileController@UpdateAddress');
    Route::get('/password', 'ProfileController@password');
    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::get('/user', 'ProfileController@index');
    Route::get('/finish', function() {
        return view('user.finish');
    });
});
