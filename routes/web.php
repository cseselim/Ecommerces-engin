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


/*==========================
====Frontend contollers=====
============================*/

Route::group(['namespace' => 'Frontend'], function(){

    Route::get('/', 'HomeController@home')->name('home');
    Route::get('products', 'HomeController@products')->name('products');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::get('/product/{slug}', 'ProductContorller@productDetails')->name('product');
    Route::get('/category/{id}', 'ProductContorller@categoryproducts')->name('categoryproducts');
    Route::get('/cart', 'CartController@ShowCart')->name('show.cart');
    Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::post('/removeCart', 'CartController@removeCart')->name('remove.cart');
    Route::get('/cartclear', 'CartController@cartclear')->name('cart.clear');

    Route::get('/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/userprofile', 'AuthController@userprofile')->name('user.profile');
    Route::post('/order', 'CartController@order')->name('order.now');
    Route::get('/sendorderotification', 'CartController@sendorderotification')->name('sendorderotification');
    
    Route::get('/registetionfrom', 'AuthController@ShowRegistetionForm')->name('registetion.from');
    Route::post('/processregistetion', 'AuthController@processRegistetion')->name('process.registetion');
    Route::get('/accountvarify/{token}', 'AuthController@accountvarify')->name('account.varify');


    Route::get('/loginfrom', 'AuthController@ShowLoginForm')->name('login.form');
    Route::post('/processlogin', 'AuthController@processLogin')->name('process.login');
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/logout', 'AuthController@logout')->name('logout');



});
