<?php

/*
|--------------------------------------------------------------------------
| Module: General
|--------------------------------------------------------------------------
*/

Route::pattern('lang', '[0-9a-z]+');

// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// //	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
// 	'middleware' => [ 'localeSessionRedirect' ]
// ],
// function()
// {
// --------------------------------------------------------------------------

// Resources
// Controllers
	Route::get('welcome/general', array(
		'uses'=>'GeneralController@welcome'
		));

	Route::get('/', array(
//		'uses'=>'GeneralController@index'
		'uses'=>'DashboardController@index'
		));

	Route::get('language/{lang}', array(
//		'as' => 'language.select',
		'uses' => 'LanguageController@setLanguage'
		));



// API DATA



// Admin
//Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	Route::group(['prefix' => 'admin'], function() {

		Route::pattern('id', '[0-9]+');

// Admin Resources
// Admin Controllers
		Route::resource('statuses', 'StatusesController');

// Admin API DATA
		Route::get('api/statuses', array(
//			'as'=>'api.statuses',
			'uses'=>'StatusesController@data'
			));

	});


// --------------------------------------------------------------------------
// });
