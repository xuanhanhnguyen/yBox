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
    return view('welcome');
});
Route::group(['prefix' => 'page'], function () {
    Route::get('/', 'Page\HomeController@index');


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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
