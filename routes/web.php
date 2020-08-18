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



Route::get('/', 'PagesController@home');

Route::get('/messages/{message}', 'MessagesController@show')->name('messages.show');

Auth::routes();
//login con redes
Route::get('/auth/github', 'SocialAuthController@github')->name('social.auth');
Route::get('/auth/github/callback', 'SocialAuthController@callback');
Route::post('/auth/github/register','SocialAuthController@register')->name('register.auth');
Route::get('/messages', 'MessagesController@search')->name('messages.search');
Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {

    Route::post('/messages/create', 'MessagesController@create')->name('messages.create');
    Route::get('/conversations/{conversation}', 'UsersController@showConversation')->name('user.conversation');// se púede crear un controller
   
    Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
    Route::post('/{username}/follow','UsersController@follow')->name('user.follow');
  
    Route::post('/{username}/unfollow','UsersController@unfollow')->name('user.unfollow');

	Route::get('/api/notifications', 'UsersController@notifications');
    
});

Route::get('/api/messages/{message}/responses','MessagesController@responses')->name('responses.api');


Route::get('/{username}/follows', 'UsersController@follows')->name('user.follows');
Route::get('/{username}/followers', 'UsersController@followers')->name('user.followers');
Route::get('/{username}', 'UsersController@show')->name('user.show');

