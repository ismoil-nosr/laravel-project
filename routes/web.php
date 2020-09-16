<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Post;
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


//GET REQUESTS
Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/admin', function(){
    return view('admin.index');
});

Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@about');

Route::get('/admin/feedbacks', 'FeedbackController@index');

//POST REQUESTS
Route::post('posts', 'PostController@store');
Route::post('contacts', 'FeedbackController@store');