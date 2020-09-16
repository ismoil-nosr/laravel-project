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


Route::get('/', function() {
    $posts = App\Post::latest()->published()->get();
    return view('index', compact('posts'));
});
Route::get('/admin/feedbacks', 'FeedbackController@index');

Route::view('/about', 'about');
Route::view('/contacts', 'contacts');
Route::view('/admin', 'admin.index');

Route::resource('posts', 'PostController');

