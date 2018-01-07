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
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	
	Route::get("/","HomeController@index");

	Route::get('category={category_id}/word={word_id}', 'HomeController@descriptionByWordAndCategoryID');

	Route::get('/category={id}', 'HomeController@getWordsByCategory');

	Route::any('search', 'HomeController@getWordsByName');

	Route::get('glossary/user/id={id}', 'HomeController@glossaryByUserId');

	Route::get('glossary/add/word/id={id}', 'HomeController@glossaryAddWord');

	Route::get('glossary/delete/word/id={id}', 'HomeController@glossaryDeleteWord');

	Route::get('dashboard', ['middleware' => 'admin', 'uses'=>'HomeController@dashboard']);

	Auth::routes();

	Route::any('logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::get('/description/edit/id={id}', 'HomeController@descriptionEdit');

	Route::get('/description/add', 'HomeController@descriptionAdd');

	Route::get('/category/add', 'HomeController@categoryAdd');

	Route::get('/category/edit/id={id}', 'HomeController@categoryEdit');
	
});

Route::get('search-live={name}', 'HomeController@getWordsByNameLive');



