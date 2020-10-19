<?php

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

Route::get('/', 'PagesController@index');

// Route::get('/about', 'PagesController@about');

// Route::get('/services', 'PagesController@services');

Route::get('/signs/mail', 'SignsController@notif')->name('signs.mail');

Route::get('/signs/history', 'SignsController@history')->name('signs.history');

Route::get('/signs/upload/{sign}', 'SignsController@upload');

Route::get('/signs/cancel/{sign}', 'SignsController@cancel');

Route::post('/signs/fetchSearch', 'SignsController@fetchSearch')->name('signs.fetch');

Route::post('/signs/uploading/{sign}', 'SignsController@uploading');

Route::resource('signs', 'SignsController');

Route::get('/signs/downloading/{sign}', 'SignsController@downloadingFile');

Route::get('/signs/downloadingoriginal/{sign}', 'SignsController@downloadingOriginalFile');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
