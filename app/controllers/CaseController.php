<?php

class CaseController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($username)
	{
		

		$cases = User::whereUsername($username)->first()->courtcases;
		
		return View::make('cases.index', compact('cases'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('cases.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();

        // Declare the rules for the form validation.
        $rules = [
        	'case_type'  => 'required',
        	//Plaintiff Validation
        	'P_full-name'  => 'required',
        	'P_address-line1'  => 'required',
        	'P_city'  => 'required',
        	'P_state'  => 'required',
        	'P_postal-code'  => 'required',
        	'P_phone'  => 'required',
        	'P_SSN'  => 'required', //in future use |unique:parties to avoid duplicates
        	'P_sex'  => 'required',
        	'P_DOB'  => 'required',
        	'P_DL'  => 'required',
       		//Defendant Validation
        	'D_full-name'  => 'required',
        	'D_address-line1'  => 'required',
        	'D_city'  => 'required',
        	'D_state'  => 'required',
        	'D_postal-code'  => 'required',
        	'D_phone'  => 'required',
        	'D_SSN'  => 'required', //in future use |unique:parties to avoid duplicates
        	'D_sex'  => 'required',
        	'D_DOB'  => 'required',
        	'D_DL'  => 'required',
		 ];

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {

        	return Redirect::back()->withErrors($validator)->withInput()->with('error', 'Your case has not been opened. Please review the errors below.');
        
        }

        // ADD PARTIES
        	//Add if statement to avoid duplicate entries.
		        $plaintiff = new Party;
			        $plaintiff->name 			= Input::get('P_full-name');
			        $plaintiff->address1 		= Input::get('P_address-line1');
			        $plaintiff->address2 		= Input::get('P_address-line2');
			        $plaintiff->city 			= Input::get('P_city');
			        $plaintiff->state 			= Input::get('P_state');
			        $plaintiff->zip 			= Input::get('P_postal-code');
			        $plaintiff->phone 			= Input::get('P_phone');
			        $plaintiff->SSN 			= Input::get('P_SSN');
			        $plaintiff->DL 				= Input::get('P_DL');
			        $plaintiff->DOB 			= Input::get('P_DOB');
			        $plaintiff->alias 			= Input::get('P_alias1');
			        $plaintiff->alias2 			= Input::get('P_alias2');
		        $plaintiff->save();
			    
		        //Add if statement to avoid duplicate entries.
			    $defendant = new Party;
			        $defendant->name 			= Input::get('D_full-name');
			        $defendant->address1 		= Input::get('D_address-line1');
			        $defendant->address2 		= Input::get('D_address-line2');
			        $defendant->city 			= Input::get('D_city');
			        $defendant->state 			= Input::get('D_state');
			        $defendant->zip 			= Input::get('D_postal-code');
			        $defendant->phone 			= Input::get('D_phone');
			        $defendant->SSN 			= Input::get('D_SSN');
			        $defendant->DL 				= Input::get('D_DL');
			        $defendant->DOB 			= Input::get('D_DOB');
			        $defendant->alias 			= Input::get('D_alias1');
			        $defendant->alias2 			= Input::get('D_alias2');
		        $defendant->save();

		// ADD CASE
			$case_type = Input::get('case_type');
			$year = date("Y");
	        
	        $case = new CourtCase;
	        $case->type                  = $case_type;  
	        $case->filing_attorney       = Confide::user()->username;
	        $case->user_id				 = Confide::user()->id;
	        $case->save();


	        $case->case_caption		 = Input::get('P_full-name')." v. ".Input::get('D_full-name');
	        $case->case_number           = $year.$case_type.$case->id;
	        $case->save();



	        return Redirect::to('/case/'.$case_number)
	        	->with('success', 'Case Filed Successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $casenumber
	 * @return Response
	 */
	public static function show($casenumber)
	{

		$case = CourtCase::with('uploads')->whereCaseNumber($casenumber)
			->first();
		
		return View::make('cases.show', compact('case'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $casenumber
	 * @return Response
	 */
	public function edit($casenumber)
	{
        return View::make('cases.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $casenumber
	 * @return Response
	 */
	public function update($casenumber)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $casenumber
	 * @return Response
	 */
	public function destroy($casenumber)
	{
		//
	}


	/**
	 * Upload File To Specific Case.
	 *
	 * @param  int  $casenumber
	 * @return Response
	 */
	public function upload($casenumber)
	{

		$case_number = $casenumber;

        return View::make('cases.upload')
        	->with('case_number', $case_number);
		
	}

	

	public function searchAddPlaintiff()
	{
		
		$data = Input::all();

        // Declare the rules for the form validation.
        $rules = ['SSN'  => 'required|exists:parties'];

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {

        	return Redirect::back()->withErrors($validator)->withInput();
        
        }

			$SSN = Input::get('SSN');

			$party_id = Party::where('SSN', '=', $SSN)->pluck('id');

			// set session
			Session::set('plaintiff_id', $party_id);

			// redirect to next step
			return Redirect::to('case/create/defendant');
		
	}

	public function searchAddDefendant()
	{
		
		$data = Input::all();

        // Declare the rules for the form validation.
        $rules = ['SSN'  => 'required|exists:parties'];

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {

        	return Redirect::back()->withErrors($validator)->withInput();
        
        }

			$SSN = Input::get('SSN');

			$party_id = Party::where('SSN', '=', $SSN)->pluck('id');

			// set session
			Session::set('defendant_id', $party_id);

			// redirect to next step
			return Redirect::to('case/create/confirm');
		
	}


}
