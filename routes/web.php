<?php

use App\Post;
use Illuminate\Support\Carbon;
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
    
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/','Page\ProfileController@index');
        Route::post('/avatar','Page\ProfileController@avatar')->name('changeAvatar');
        Route::post('/','Page\ProfileController@edit')->name('edit_user');
    });


    /**
     * Trang tuyển dụng
     */

    Route::group(['prefix' => 'tuyen-dung',], function () {
        Route::name('recruiment.')->group(function () {
            Route::get('/', 'Page\RecruimentController@index')->name('index');
            Route::post('/them-bai-viet', 'Page\RecruimentController@createPost')->name('post.create');
        });
    });
    
    /**
     * Trang học bổng  
     */

    Route::group(['prefix' => 'hoc-bong',], function () {
        Route::name('scholarship.')->group(function () {
            Route::get('/', 'Page\ScholarshipController@index')->name('index');
            Route::get('/{id}', 'Page\ScholarshipController@detail')->name('detail');
        });
    });
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

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
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('user')->group(function () {
      
        Route::get('update/{id}', 'User\AdminController@update');
        Route::post('update/{id}', 'User\AdminController@saveUpdate');
        Route::get('delete/{id}', 'User\AdminController@delete');
        Route::get('/show', 'User\AdminController@showAdmin')->name('showUser');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/like-post/{postId}', 'UserController@likePost')->name('user.post.like');
    Route::post('/comment-post/{postId}', 'UserController@commentPost')->name('user.post.comment');
    Route::post('/reply-comment/{postId}/{commentId}', 'UserController@replyPost')->name('user.post.reply');
    Route::get('/follow-user/{hrId}', 'UserController@followUser')->name('user.hr.follow');
    Route::get('/delete-post/{postId}', 'UserController@deletePost')->name('user.post.delete');
    Route::post('/share-post/{postId}', 'UserController@share')->name('user.post.share');
    Route::get('/search-post', 'UserController@search')->name('user.post.search');
});




/**
 *  Xử lý paypal
 */
Route::post('paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');




Auth::routes();