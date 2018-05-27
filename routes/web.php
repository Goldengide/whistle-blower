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

Route::get('/test', function(){
	return view('index');
});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');
Route::post('/tip/edit', 'TipController@update');
Route::get('/tip/view/{id}', 'TipController@view');

Route::get('/test', 'TipController@test');
Route::get('/documents/{id}', 'TipController@viewDocument');
Route::get('/data/backup', 'NotificationController@backupData');
Route::get('/400', 'TipController@notfound');

Route::group(['middleware' => 'auth', 'prefix' => 'message'], function() {

	Route::get('/compose', 'MessageController@compose');
	Route::get('/compose/{id}', 'MessageController@compose');
	Route::post('/send', 'MessageController@send');
	Route::get('/read/{id}', 'MessageController@read');
	Route::get('/response', 'MessageController@responsePage');
	Route::get('/{status}', 'MessageController@index');

});


Route::group(['middleware' => 'auth', 'prefix' => 'tip'], function() {
	
	Route::get('/dashboard', 'TipController@dashboard');

	Route::get('/new', 'TipController@newtip');
	Route::post('/add', 'TipController@add');
	Route::post('/update', 'TipController@update');

	Route::get('/edit/{id}', 'TipController@edit');
	Route::get('/view/{id}', 'TipController@view');
	Route::get('/list/new', 'TipController@newWhistles');
	Route::get('/list/old', 'TipController@oldWhistles');
	Route::get('/messages/new', 'TipController@newMessages');
	Route::get('/messages/old', 'TipController@oldMessages');
	Route::post('/document/upload', 'TipController@viewAndUploadMoreDocuments');
	Route::get('/notification', 'TipController@notifications');
	Route::get('/read/notification/{id}', 'TipController@readNotification');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin/tip'], function() {
	Route::get('/dashboard', 'AdminController@dashboard');

	// Route::get('/new', 'TipController@newtip');

	Route::get('/edit/{id}', 'AdminController@edit');
	Route::get('/view/{id}', 'AdminController@view');
	Route::get('/messages/new', 'AdminController@newMessages');
	Route::get('/messages/old', 'AdminController@oldMessages');
	Route::get('/list/new', 'AdminController@newWhistles');
	Route::get('/list/old', 'AdminController@oldWhistles');
	Route::get('/notification', 'AdminController@notifications');
	Route::get('/read/notification/{id}', 'AdminController@readNotification');
	Route::post('/approve', 'AdminController@approve');
	Route::post('/decline', 'AdminController@decline');
	Route::post('/success', 'AdminController@markSuccessful');
	Route::post('/redundant', 'AdminController@markRedundant');
	Route::get('/users/regular', 'AdminController@regularUsers');
	Route::get('/users/admin', 'AdminController@adminUsers');
	Route::get('/success', 'AdminController@successfulWhistles');
	Route::get('/users/make-admin/{id}', 'AdminController@makeAdmin');
});