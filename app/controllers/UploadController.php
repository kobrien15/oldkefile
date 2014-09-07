<?php

class UploadController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('uploads.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$case_numbers = CourtCase::whereUserId(Confide::user()->id)->lists('case_number');
		
		$select_array = array();
		foreach ($case_numbers as $case) 
		{
    		$select_array[$case] = $case;
		}

        return View::make('uploads.create')->with('select_array', $select_array);
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
        $rules = array(
            'document'  => 'required|mimes:pdf,png,doc,docx,txt,jpg|max:6250000',
            'case_number' => 'required'
        );

        // Create a new validator instance.
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {

        	return Redirect::back()->withErrors($validator)->withInput();
        
        }
        	$files = Input::file('document');
			
			foreach($files as $file) //for multiple files
			{
					$upload = new Upload;

					$case_number = Input::get('case_number');
					$name = date("Ymd G:i:s T") . '-' . $file->getClientOriginalName();
					$folder = 'uploads/'.$case_number;

					$upload->orig_filename = $file->getClientOriginalName();
					$upload->filed_by = Confide::user()->username;
					$upload->user_id = Confide::user()->id;
					$upload->case_number = $case_number;
					$upload->save();

					
					$file->move($folder, $name);
					$upload->path = URL::to('/').'/'.$folder.'/'.$name;
					$upload->save();

			}

			
			return Redirect::to('/'.Input::get('case_number'))
	            		->with('success', 'Your file has been successfully filed with the court!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($casenumber)
	{
        return View::make('uploads.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($casenumber)
	{
        return View::make('uploads.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($casenumber)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($casenumber)
	{
		//
	}

}
