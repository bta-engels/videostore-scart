<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScartController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\DashboardAdminController;

Auth::routes();
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');

Route::domain(env('APP_DOMAIN'))
    ->group( function () {
        // public stuff
        Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');
        Route::get('/movie/show/{id}', [MovieController::class, 'show'])->name('movie.show');
        Route::get('/scart', [ScartController::class, 'index'])->name('scart.index');
        Route::post('/scart/update/{id}', [ScartController::class, 'update'])->name('scart.update');
        Route::post('/scart/destroy/{id}', [ScartController::class, 'destroy'])->name('scart.destroy');
        Route::post('/scart/increment/{id}', [ScartController::class, 'increment'])->name('scart.increment');
        Route::post('/scart/decrement/{id}', [ScartController::class, 'decrement'])->name('scart.decrement');

        Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/author/show/{id}', [AuthorController::class, 'show'])->name('author.show');

        Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

        Route::redirect('/', '/movie');
    });

Route::domain(env('APP_ADMIN_DOMAIN'))
    ->namespace('Admin')
    ->group( function () {
    // admin stuff
        Route::get('/', [DashboardAdminController::class])->name('admin.dashboard');

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
