<?php

use App\Http\Controllers\RoutesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScartController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\DashboardAdminController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// public routes
Route::domain(env('APP_DOMAIN'))
    ->group( function () {
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

// admin routes
Route::domain(env('APP_ADMIN_DOMAIN'))
    ->namespace('Admin')
    ->group( function () {
        Route::get('/', [DashboardAdminController::class])->name('admin.dashboard');

        Route::get('/movie', [AdminMovieController::class, 'index'])->name('admin-movie.index');
        Route::get('/movie/show/{id}', [AdminMovieController::class, 'show'])->name('admin-movie.show');
        Route::get('/movie/edit/{id?}', [AdminMovieController::class, 'edit'])->name('admin-movie.edit');
        Route::post('/movie/store/{id?}', [AdminMovieController::class, 'store'])->name('admin-movie.store');
        Route::get('/movie/delete/{id}', [AdminMovieController::class, 'delete'])->name('admin-movie.delete');

        Route::get('/author', [AdminAuthorController::class, 'index'])->name('admin-author.index');
        Route::get('/author/show/{id}', [AdminAuthorController::class, 'show'])->name('admin-author.show');
        Route::get('/author/edit/{id?}', [AdminAuthorController::class, 'edit'])->name('admin-author.edit');
        Route::post('/author/store/{id?}', [AdminAuthorController::class, 'store'])->name('admin-author.store');
        Route::get('/author/delete/{id}', [AdminAuthorController::class, 'delete'])->name('admin-author.delete');

        Route::get('/order', [AdminOrderController::class, 'index'])->name('admin-order.index');
        Route::get('/order/show/{id}', [AdminOrderController::class, 'show'])->name('admin-order.show');
        Route::get('/order/edit/{id?}', [AdminOrderController::class, 'edit'])->name('admin-order.edit');
        Route::post('/order/store/{id?}', [AdminOrderController::class, 'store'])->name('admin-order.store');
        Route::get('/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin-order.delete');
    });

Route::get('routes', [RoutesController::class, 'index'])
    ->name('routes')
//    ->middleware('auth')
;

// wenn eine route aufgerufen wird, die nicht definiert wurde
Route::fallback(function() {
    $message = 'Diese Route gibt\'s nicht bei mir!';
    return view('errors.message', compact('message'));
});
//Route::get('/logout', 'Auth\LoginController@logout');
