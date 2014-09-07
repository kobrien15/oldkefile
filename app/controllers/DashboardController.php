<?php

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index($username)
	{
		$user_cases = CourtCase::whereFilingAttorney($username)
			->with('uploads')
			->orderBy('updated_at', 'desc')
			->get();

		// $user_uploads = Upload::whereFiledBy($username)
		// 	->orderBy('updated_at', 'desc')
		// 	->get();

		return View::make('dashboard.index')
			->with('user_cases', $user_cases);
			//->with('user_uploads', $user_uploads);
	}

	public function timeline()
	{
		
	}

}