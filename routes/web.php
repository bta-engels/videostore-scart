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

Auth::routes();
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');

Route::domain(env('APP_DOMAIN'))
    ->group( function () {
        // public stuff
        Route::get('/movie', 'MovieController@index')->name('movie.index');
        Route::get('/movie/show/{id}', 'MovieController@show')->name('movie.show');
        Route::get('/scard', 'ScardController@index')->name('scard.index');
        Route::post('/scard/update/{id}', 'ScardController@update')->name('scard.update');
        Route::post('/scard/destroy/{id}', 'ScardController@destroy')->name('scard.destroy');
        Route::post('/scard/increment/{id}', 'ScardController@increment')->name('scard.increment');
        Route::post('/scard/decrement/{id}', 'ScardController@decrement')->name('scard.decrement');

        Route::get('/author', 'AuthorController@index')->name('author.index');
        Route::get('/author/show/{id}', 'AuthorController@show')->name('author.show');

        Route::post('/order/store', 'OrderController@store')->name('order.store');

        Route::redirect('/', '/movie');
    });

Route::domain(env('APP_ADMIN_DOMAIN'))
    ->namespace('Admin')
    ->group( function () {
    // admin stuff
        Route::get('/', 'DashboardAdminController')->name('admin.dashboard');

        Route::get('/movie', 'AdminMovieController@index')->name('admin-movie.index');
        Route::get('/movie/show/{id}', 'AdminMovieController@show')->name('admin-movie.show');
        Route::get('/movie/edit/{id?}', 'AdminMovieController@edit')->name('admin-movie.edit');
        Route::post('/movie/store/{id?}', 'AdminMovieController@store')->name('admin-movie.store');
        Route::get('/movie/delete/{id}', 'AdminMovieController@delete')->name('admin-movie.delete');

        Route::get('/author', 'AdminAuthorController@index')->name('admin-author.index');
        Route::get('/author/show/{id}', 'AdminAuthorController@show')->name('admin-author.show');
        Route::get('/author/edit/{id?}', 'AdminAuthorController@edit')->name('admin-author.edit');
        Route::post('/author/store/{id?}', 'AdminAuthorController@store')->name('admin-author.store');
        Route::get('/author/delete/{id}', 'AdminAuthorController@delete')->name('admin-author.delete');

        Route::get('/order', 'AdminOrderController@index')->name('admin-order.index');
        Route::get('/order/show/{id}', 'AdminOrderController@show')->name('admin-order.show');
        Route::get('/order/edit/{id?}', 'AdminOrderController@edit')->name('admin-order.edit');
        Route::post('/order/store/{id?}', 'AdminOrderController@store')->name('admin-order.store');
        Route::get('/order/delete/{id}', 'AdminOrderController@delete')->name('admin-order.delete');
    });

Route::domain(env('TELESCOPE_DOMAIN'))
    ->middleware('auth')
    ->group( function () {
        // admin stuff
//        Route::get('/', 'DashboardAdminController')->name('admin.dashboard');
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
