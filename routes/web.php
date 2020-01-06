<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

<<<<<<< HEAD
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::prefix('recruiment')->group(function () {
        Route::get('/create', 'Recruitment\RecruimentsController@create');
        Route::post('/create', 'Recruitment\RecruimentsController@saveCreate')->name('saveRecruitment');
        Route::get('update/{id}', 'Recruitment\RecruimentsController@update');
        Route::post('update/{id}', 'Recruitment\RecruimentsController@saveUpdate');
        Route::get('delete/{id}', 'Recruitment\RecruimentsController@delete');
        Route::get('/show', 'Recruitment\RecruimentsController@showRecruitment')->name('showrecruitment');
    });
    Route::prefix('scholarship')->group(function () {
        Route::get('/create', 'Scholarship\ScholarshipController@create');
        Route::post('/create', 'Scholarship\ScholarshipController@saveCreate')->name('saveScholarship');
        Route::get('update/{id}', 'Scholarship\ScholarshipController@update');
        Route::post('update/{id}', 'Scholarship\ScholarshipController@saveUpdate');
        Route::get('delete/{id}', 'Scholarship\ScholarshipController@delete');
        Route::get('/show', 'Scholarship\ScholarshipController@showScholarship')->name('showScholarship');
    });
});


Auth::routes();
=======
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/like-post/{postId}', 'UserController@likePost')->name('user.post.like');
    Route::post('/comment-post/{postId}', 'UserController@commentPost')->name('user.post.comment');
    Route::post('/reply-comment/{postId}/{commentId}', 'UserController@replyPost')->name('user.post.reply');
    Route::get('/follow-user/{hrId}', 'UserController@followUser')->name('user.hr.follow');

});
>>>>>>> 2f6bb649cd60df91b90be45f6231ae319541e803

Auth::routes();