<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});
Route::resource('/onetoone', 'CustomerController');
Route::resource('/onetomany', 'PostController');
Route::resource('/comment','CommentController');
Route::resource('/manytomany', 'StudentController');
Route::resource('/book', 'BookController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

