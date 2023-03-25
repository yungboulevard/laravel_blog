<?php

use App\Http\Controllers\Personal\Liked\DeleteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Personal\Main', 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('main.index');
    });

    Route::group(['namespace' => 'Personal\Liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexController::class)->name('liked.index');
        Route::delete('/{post}', DeleteController::class)->name('liked.delete');
    });

    Route::group(['namespace' => 'Personal\Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Admin\Main'], function () {
        Route::get('/', IndexController::class)->name('main.index');
    });

    Route::group(['namespace' => 'Admin\Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('post.index');
        Route::get('/create', 'CreateController')->name('post.create');
        Route::post('/', 'StoreController')->name('post.store');
        Route::get('/{post}', 'ShowController')->name('post.show');
        Route::get('/{post}/edit', 'EditController')->name('post.edit');
        Route::patch('/{post}', 'UpdateController')->name('post.update');
        Route::delete('/{post}', 'DeleteController')->name('post.delete');
});
    
    Route::group(['namespace' => 'Admin\Category', 'prefix' => 'categories'], function () {
            Route::get('/', 'IndexController')->name('category.index');
            Route::get('/create', 'CreateController')->name('category.create');
            Route::post('/', 'StoreController')->name('category.store');
            Route::get('/{category}', 'ShowController')->name('category.show');
            Route::get('/{category}/edit', 'EditController')->name('category.edit');
            Route::patch('/{category}', 'UpdateController')->name('category.update');
            Route::delete('/{category}', 'DeleteController')->name('category.delete');
    });

    Route::group(['namespace' => 'Admin\Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('tag.index');
        Route::get('/create', 'CreateController')->name('tag.create');
        Route::post('/', 'StoreController')->name('tag.store');
        Route::get('/{tag}', 'ShowController')->name('tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('tag.delete');
    });

    Route::group(['namespace' => 'Admin\User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('user.index');
        Route::get('/create', 'CreateController')->name('user.create');
        Route::post('/', 'StoreController')->name('user.store');
        Route::get('/{user}', 'ShowController')->name('user.show');
        Route::get('/{user}/edit', 'EditController')->name('user.edit');
        Route::patch('/{user}', 'UpdateController')->name('user.update');
        Route::delete('/{user}', 'DeleteController')->name('user.delete');
    });
});

Auth::routes(['verify' => true]);

