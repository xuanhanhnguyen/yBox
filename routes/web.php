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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});
Route::group(['prefix' => 'page'], function () {
    Route::get('/', 'Page\HomeController@index');
    Route::get('/profile','Page\ProfileController@index');

    /**
     * Trang tuyển dụng
     */
    Route::group(['prefix' => 'tuyen-dung',], function () {
        Route::name('recruiment.')->group(function () {
            Route::get('/', 'Page\RecruimentController@index')->name('index');
            Route::post('/them-bai-viet', 'Page\RecruimentController@createPost')->name('post.create');
        });
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/like-post/{postId}', 'UserController@likePost')->name('user.post.like');
    Route::post('/comment-post/{postId}', 'UserController@commentPost')->name('user.post.comment');
    Route::post('/reply-comment/{postId}/{commentId}', 'UserController@replyPost')->name('user.post.reply');
    Route::get('/follow-user/{hrId}', 'UserController@followUser')->name('user.hr.follow');

});

Auth::routes();