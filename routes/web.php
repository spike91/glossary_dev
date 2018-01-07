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

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get("/","HomeController@index");

	Route::get('category={category_id}/word={word_id}', 'HomeController@descriptionByWordAndCategoryID');

	Route::get('/category={id}', 'HomeController@getWordsByCategory');

	Route::get("register",function(){
		return view('auth.register');
	});
	
	Route::get("login",function(){
		return view('auth.login');
	});

	Route::any('search', 'HomeController@getWordsByName');

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
});


