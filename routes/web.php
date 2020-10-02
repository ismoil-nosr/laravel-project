<?php

use App\Feedback;
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

/** ------------------------------------------
 *  Authorization routes
 *  ------------------------------------------
 */
Auth::routes();


/** ------------------------------------------
 *  Home page
 *  ------------------------------------------
 */
Route::get('/', 'HomeController@index');


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    # Posts Management
    Route::get('posts', 'Admin\AdminPostsController@index');
    Route::get('posts/create', 'Admin\AdminPostsController@create');
    Route::get('posts/{post}/edit', 'Admin\AdminPostsController@edit');
    Route::POST('posts', 'Admin\AdminPostsController@store');
    Route::PATCH('posts/{post}', 'Admin\AdminPostsController@update');
    Route::DELETE('posts/{post}', 'Admin\AdminPostsController@destroy');

    # Tags Management
    Route::get('tags', 'Admin\AdminTagsController@index');
    Route::get('tags/create', 'Admin\AdminTagsController@create');
    Route::get('tags/{tag}/edit', 'Admin\AdminTagsController@edit');
    Route::POST('tags', 'Admin\AdminTagsController@store');
    Route::PATCH('tags/{tag}', 'Admin\AdminTagsController@update');
    Route::DELETE('tags/{tag}', 'Admin\AdminTagsController@destroy');

    # Users Management
    Route::get('users', 'Admin\AdminUsersController@index');
    Route::get('users/create', 'Admin\AdminUsersController@newCreate');
    Route::get('users/{user}/edit', 'Admin\AdminUsersController@edit');
    Route::POST('users', 'Admin\AdminUsersController@store');
    Route::PATCH('users/{user}', 'Admin\AdminUsersController@update');
    Route::DELETE('users/{user}', 'Admin\AdminUsersController@destroy');

    # Roles Management
    Route::get('roles', 'Admin\AdminRolesController@index');
    Route::get('roles/create', 'Admin\AdminRolesController@create');
    Route::get('roles/{role}/edit', 'Admin\AdminRolesController@edit');
    Route::POST('roles', 'Admin\AdminRolesController@store');
    Route::PATCH('roles/{role}', 'Admin\AdminRolesController@update');
    Route::DELETE('roles/{role}', 'Admin\AdminRolesController@destroy');

    # Feedbacks Management
    Route::get('feedbacks', 'Admin\AdminFeedbacksController@index');
    Route::DELETE('feedbacks/{feedback}', 'Admin\AdminFeedbacksController@destroy');

    # Admin Dashboard
    Route::get('/', 'Admin\AdminDashboardController@index');
});


/** ------------------------------------------
 *  Blog post routes
 *  ------------------------------------------
 */
Route::group(['prefix' => 'posts'], function()
{
    Route::get('/', 'PostsController@index');
    Route::get('{post}', 'PostsController@show');
    Route::get('tags/{tag}', 'TagsController@index');

});


/** ------------------------------------------
 *  POST-queries
 *  ------------------------------------------
 */
Route::post('/contact', 'FeedbacksController@store');

/** ------------------------------------------
 *  Static pages
 *  ------------------------------------------
 */
Route::view('/about', 'about');
Route::view('/contact', 'contact');