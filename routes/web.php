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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('/front/home');
});

Route::get('/shop', function () {
    return view('/front/shop');
});

Route::get('/about', function () {
    return view('front/about');
});

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');
Route::get('/shop', 'HomeController@shop');
Route::get('/contact', 'ContactController@contact');
Route::post('/submitForm', 'ContactController@submitForm');
Route::get('/product_details/{id}', 'HomeController@product_details');

Route::get('/category/list/{name}', 'CategoriesController@list');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/removeItem/{id}', 'CartController@removeItem');
Route::put('/cart/updateItem/{id}', 'CartController@updateItem');

Route::get('/wishlist', 'HomeController@view_wishlist');
Route::post('addToWishList', 'HomeController@wishlist')->name('addToWishList');
Route::get('/removeFromWishlist/{id}', 'HomeController@remove_from_wishlist');

Route::post('/addReview', 'HomeController@addReview')->name('addReview');

Route::post('/search', 'HomeController@search');
Route::post('/advancedSearch', 'ShopController@advancedSearch');
Route::post('/searchSingleCategory', 'CategoriesController@searchSingleCategory');

Route::get('google', function () {
    return view('googleAuth');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');


        Route::POST('/admin/store', 'AdminController@store');
        Route::get('/inbox', 'AdminController@inbox');
        Route::get('/inbox/{id}', 'AdminController@readMessage');
        Route::delete('/inbox/deleteAll', 'AdminController@clearAllMessages');
        Route::delete('/inbox/delete/{id}', 'AdminController@clearMessage');

        Route::resource('users', 'UsersController');
        Route::get('findUser/{id}', 'UsersController@findUser')->name('findUser');
        Route::post('editUser/{id}', 'UsersController@editUser')->name('editUser');
        Route::get('editImage/{id}', 'UsersController@editImage')->name('editImage');

        Route::resource('products', 'ProductsController');
        Route::get('editProductForm/{id}', 'ProductsController@editProductForm')->name('editProductForm');
        Route::post('editProduct/{id}', 'ProductsController@editProduct')->name('editProduct');
        Route::get('editImage/{id}', 'ProductsController@editImage')->name('editImage');
        Route::post('editProductImage', 'ProductsController@editProductImage')->name('editProductImage');

        Route::get('/addProperty/{id}', 'ProductsController@addProperty')->name('addProperty');
        Route::post('/submitProperty', 'ProductsController@submitProperty')->name('submitProperty');
        Route::post('/editProperty', 'ProductsController@editProperty');
        Route::delete('/removeProperty/{id}', 'ProductsController@removeProperty');


        Route::resource('categories','CategoriesController');
        Route::get('editCategoryForm/{id}', 'CategoriesController@editCategoryForm')->name('editCategoryForm');
        Route::post('update/{id}', 'CategoriesController@update')->name('update');

        Route::resource('ads','AdsController');
    }
);


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/checkout', 'CheckoutController@index');
    Route::get('/checkoutaddress', 'CheckoutController@checkoutaddress');
    Route::post('/formValidate', 'CheckoutController@formValidate');
    Route::get('/finishOrder', 'CheckoutController@finishOrder');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/infos', 'ProfileController@infos');
    Route::post('/updateInfos', 'ProfileController@UpdateInfos');
    Route::get('/password', 'ProfileController@password');
    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::get('/user', 'ProfileController@index');
    Route::get('/finish', function() {
        return view('user.finish');
    });
});
