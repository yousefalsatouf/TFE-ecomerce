<?php

use Illuminate\Support\Facades\Auth;

Route::get('lang/home', 'LangController@index');
Route::get('lang/change', 'LangController@change')->name('changeLang');

Route::get('/create-newsletter','NewsletterController@create');
Route::put('/newsletter','NewsletterController@store');

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

Route::get('/category/list/{id}', 'CategoriesController@list');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/removeItem', 'CartController@removeItem');
Route::get('/cart/updateItem/', 'CartController@updateItem');

Route::get('/wishlist', 'HomeController@view_wishlist');
Route::post('addToWishList', 'HomeController@wishlist')->name('addToWishList');
Route::get('/removeFromWishlist/{id}', 'HomeController@remove_from_wishlist');

Route::get('/shop/products', 'ShopController@index');
Route::get('/search', 'ShopController@search');
Route::get('/advancedSearch', 'ShopController@advancedSearch');

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('/addReview', 'HomeController@addReview');
Route::get('/removeReview', 'HomeController@removeReview');
Route::get('/singleProd/like', 'ReviewsController@like');
Route::get('/singleProd/dislike', 'ReviewsController@dislike');
Route::get('/singleProd/fetchComments', 'ReviewsController@fetchComments');
Route::get('singleProd/submitReply', 'ReviewsController@submitReply');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function ()
    {
        Route::get('/', function ()
        {
            return view('admin.index');
        })->name('admin.index');

        Route::POST('/admin/store', 'AdminController@store');

        //locations API
        Route::get('/locations', 'LocationsController@index');
        Route::get('/removeLocation', 'LocationsController@removeLocation');
        Route::post('/addLocation', 'LocationsController@addLocation');

        // auth API
        Route::get('/getAuth', 'ProfileController@getAuth');
        Route::post('/updateProfile', 'ProfileController@updateProfile');

        // inbox API


        // users API
        Route::resource('users', 'UsersController');
        Route::get('/changeRole', 'UsersController@changeRole');

        // Products API
        Route::resource('products', 'ProductsController');
        Route::post('/addProduct', 'ProductsController@store');
        Route::get('/removeProduct', 'ProductsController@removeProduct');

        // Categories API
        Route::resource('categories','CategoriesController');
        Route::post('/addCategory', 'CategoriesController@store');
        Route::get('/removeCategory', 'CategoriesController@removeCategory');


        // Properties API

        // Orders API
        Route::resource('/orders','OrdersController');
        Route::post('/changeOrderStatus', 'OrdersController@changeOrderStatus')->name('changeStatus');
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

