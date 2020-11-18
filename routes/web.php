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
Route::get('/shop/products', 'ShopController@index');
Route::post('/advancedSearch', 'ShopController@advancedSearch');
Route::post('/searchSingleCategory', 'CategoriesController@searchSingleCategory');


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
        Route::get('/inbox', 'AdminController@inbox')->name('readMsg');
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

        Route::resource('orders','OrdersController');
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

//payment form
//Route::get('/', 'PaymentController@index');

// route for processing payment
Route::post('/paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('/status', 'PaymentController@getPaymentStatus');

