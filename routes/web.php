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
Route::GET('/', 'HomeController@index');


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    # Posts Management
    Route::GET('posts', 'Admin\AdminPostsController@index');
    Route::GET('posts/create', 'Admin\AdminPostsController@create');
    Route::GET('posts/{post}/edit', 'Admin\AdminPostsController@edit');
    Route::POST('posts', 'Admin\AdminPostsController@store');
    Route::PATCH('posts/{post}', 'Admin\AdminPostsController@update');
    Route::DELETE('posts/{post}', 'Admin\AdminPostsController@destroy');

    # Tags Management
    Route::GET('tags', 'Admin\AdminTagsController@index');
    Route::GET('tags/create', 'Admin\AdminTagsController@create');
    Route::GET('tags/{tag}/edit', 'Admin\AdminTagsController@edit');
    Route::POST('tags', 'Admin\AdminTagsController@store');
    Route::PATCH('tags/{tag}', 'Admin\AdminTagsController@update');
    Route::DELETE('tags/{tag}', 'Admin\AdminTagsController@destroy');

    # Users Management
    Route::GET('users', 'Admin\AdminUsersController@index');
    Route::GET('users/create', 'Admin\AdminUsersController@newCreate');
    Route::GET('users/{user}/edit', 'Admin\AdminUsersController@edit');
    Route::POST('users', 'Admin\AdminUsersController@store');
    Route::PATCH('users/{user}', 'Admin\AdminUsersController@update');
    Route::DELETE('users/{user}', 'Admin\AdminUsersController@destroy');

    # Roles Management
    Route::GET('roles', 'Admin\AdminRolesController@index');
    Route::GET('roles/create', 'Admin\AdminRolesController@create');
    Route::GET('roles/{role}/edit', 'Admin\AdminRolesController@edit');
    Route::POST('roles', 'Admin\AdminRolesController@store');
    Route::PATCH('roles/{role}', 'Admin\AdminRolesController@update');
    Route::DELETE('roles/{role}', 'Admin\AdminRolesController@destroy');

    # Feedbacks Management
    Route::GET('feedbacks', 'Admin\AdminFeedbacksController@index');
    Route::DELETE('feedbacks/{feedback}', 'Admin\AdminFeedbacksController@destroy');

    # Email-spam Management
    Route::GET('email-spam', 'Admin\AdminEmailSpamController@index');
    Route::GET('email-spam/create', 'Admin\AdminEmailSpamController@create');
    Route::GET('email-spam/{spam}', 'Admin\AdminEmailSpamController@show');
    Route::POST('email-spam', 'Admin\AdminEmailSpamController@store');
    Route::DELETE('email-spam/{spam}', 'Admin\AdminEmailSpamController@destroy');

    # Admin Dashboard
    Route::GET('/', 'Admin\AdminDashboardController@index');
});


/** ------------------------------------------
 *  Blog post routes
 *  ------------------------------------------
 */
Route::group(['prefix' => 'posts'], function()
{
    Route::GET('/', 'PostsController@index');
    Route::GET('{post}', 'PostsController@show');
    Route::GET('tags/{tag}', 'TagsController@index');

});


/** ------------------------------------------
 *  other POST-queries
 *  ------------------------------------------
 */
Route::POST('/contact', 'FeedbacksController@store');

/** ------------------------------------------
 *  Static pages
 *  ------------------------------------------
 */
Route::VIEW('/about', 'about');
Route::VIEW('/contact', 'contact');