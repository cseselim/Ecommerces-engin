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
    Route::get('/product/{slug}', 'ProductContorller@productDetails')->name('product');
    Route::get('/cart', 'CartController@ShowCart')->name('show.cart');
    Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::post('/removeCart', 'CartController@removeCart')->name('remove.cart');
    Route::get('/cartclear', 'CartController@cartclear')->name('cart.clear');

    Route::get('/checkout', 'CartController@checkout')->name('checkout');
    
    Route::get('/loginfrom', 'AuthController@ShowLoginForm')->name('login.form');
    Route::post('/processlogin', 'AuthController@processLogin')->name('process.login');

    Route::get('/registetionfrom', 'AuthController@ShowRegistetionForm')->name('registetion.from');
    Route::post('/processregitetion', 'AuthController@processRegistetion')->name('process.regitetion');


});
