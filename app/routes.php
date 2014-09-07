<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('testingc0de', function(){

	return CourtCase::where('p_id', '=', '25')
		->with('parties')
		->get();

});

Route::get('/', function()
{
	return View::make('welcome');
});// Confide routes

Route::get( 'login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::get( 'logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
Route::get( 'user/create', ['as' => 'register', 'uses' => 'UserController@create']);
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login', 				   'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');


Route::group(array('before' => 'auth'), function()
{


	Route::group(array('before' => 'authmatch'), function() 
	{
		//Alt ->before('authmatch') on each
		Route::get('{username}', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
		Route::get('{username}/profile', ['as' => 'username.profile.show', 'uses' => 'UserController@createProfile']);
		Route::post('{username}/profile', 'UserController@storeProfile');
		Route::get('{username}/upload', ['as' => 'username.upload.create', 'uses' => 'UploadController@create']);
		Route::post('{username}/upload', 'UploadController@store');
		Route::get('{username}/cases', ['as' => 'username.cases.index', 'uses' => 'CaseController@index']);

	});

	Route::pattern('casenumber', '\d{4}[a-zA-Z]{2}\d+'); //Alt. ->where('casenumber', '\d{4}[a-zA-Z]{2}\d+')
	Route::get('case/create', ['as' => 'case.create.create', 'uses' => 'CaseController@create']);
	Route::post('case/create', 'CaseController@store');
	Route::post('case/create/plaintiff/search', 'CaseController@searchAddPlaintiff');
	Route::post('case/create/defendant/search', 'CaseController@searchAddDefendant');
	Route::get('case/{casenumber}', ['as' => 'case.casenumber.show', 'uses' => 'CaseController@show']);
	Route::get('case/{casenumber}/upload', ['as' => 'case.casenumber.upload', 'uses' =>'CaseController@upload']);

});



// View::composer( ['cases.index'], function( $view )
// {

// 	$upload_count = $uploads->count();
// 	$view
// 		->with('upload_count', $upload_count);
// });

