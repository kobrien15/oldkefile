@extends('layouts.master')

@section('title')
@parent
:: New Case
@stop

@section('styles')
	{{ HTML::style('css/vendor/jasny-bootstrap.min.js') }}
@stop


{{-- Content --}}
@section('content')

{{ Form::open(['class' => 'form-horizontal']) }}
<div class="panel-group" id="accordion">
  
  <!-- Add Case Type --><div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#addCasetype">
	          Case Type
	        </a>
	      </h4>
	    </div>
	    <div id="addCasetype" class="panel-collapse collapse in">
	      <div class="panel-body">
		        <fieldset>
			      	<div class="form-group">
						<label class="col-sm-2 control-label">Case Type</label>
						<label class="control-label text-danger">{{ $errors->first('case_type') }}</label>
					    <div class="col-sm-4">
					    	{{ Form::select('case_type', ['' => 'Select Case Type', 'CV' => 'Civil', 'CR' => 'Criminal', 'DM' => 'Domestic', 'PE' => 'Probate/Estate', 'BR' => 'Bankruptcy'], Input::old('case_type'), ['class' => 'form-control', 'name' => 'case_type']); }}
					    </div>
					</div>
					<a class="btn btn-primary pull-right"data-toggle="collapse" data-parent="#accordion" href="#addPlaintiff">Next Step</a>
					
				</fieldset>
	      </div>
	    </div>
  </div><!-- / Add Case Type -->

  <!-- Add Plaintiff --><div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#addPlaintiff">
		          Add Plaintiff
		        </a>
		      </h4>
		    </div>
		    <div id="addPlaintiff" class="panel-collapse collapse">
		      <div class="panel-body">
		        <fieldset>
					    <!-- Address form -->
					
					    <!-- full-name input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">Full Name</label>
					        <label class="control-label text-danger">{{ $errors->first('P_full-name') }}</label>
					        <div class="col-sm-4">
					            <input id="P_full-name" name="P_full-name" type="text" placeholder="Personal or Business Name"
					            class="form-control" value="{{ Input::old('P_full-name') }}">
					            
					        </div>
					    </div>
					    <!-- address-line1 input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">Address Line 1</label>
					        <label class="control-label text-danger">{{ $errors->first('P_address-line1') }}</label>
					        <div class="col-sm-4">
					            <input id="address-line1" name="P_address-line1" type="text" placeholder="Street address, P.O. box, company name, c/o"
					            class="form-control" value="{{ Input::old('P_address-line1') }}">
					            
					        </div>
					    </div>
					    <!-- address-line2 input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">Address Line 2</label>
					        <label class="control-label text-danger">{{ $errors->first('P_address-line2') }}</label>
					        <div class="col-sm-4">
					            <input id="address-line2" name="P_address-line2" type="text" placeholder="Apartment, suite , unit, building, floor, etc."
					            class="form-control" value="{{ Input::old('P_address-line2') }}">
					            
					        </div>
					    </div>
					    <!-- city input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">City</label>
					        <label class="control-label text-danger">{{ $errors->first('P_city') }}</label>
					        <div class="col-sm-4">
					            <input id="P_city" name="P_city" type="text" placeholder="city" class="form-control" value="{{ Input::old('P_city') }}">
					            
					        </div>
					    </div>
					    <!-- region input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">State</label>
					        <label class="control-label text-danger">{{ $errors->first('P_state') }}</label>
					        <div class="col-sm-4">
					            <input id="P_state" name="P_state" type="text" placeholder="state"
					            class="form-control" value="{{ Input::old('P_state') }}">
					            
					        </div>
					    </div>
					    <!-- postal-code input-->
					    <div class="form-group">
					        <label class="col-sm-2 control-label">Zip / Postal Code</label>
					        <label class="control-label text-danger">{{ $errors->first('P_postal_code') }}</label>
					        <div class="col-sm-4">
					            <input id="P_postal-code" name="P_postal-code" type="text" placeholder="zip or postal code"
					            class="form-control" value="{{ Input::old('P_postal-code') }}">
					            
					        </div>
					    </div>
					

						<div class="form-group">
						  <label for="P_phone" class="col-sm-2 control-label">Phone</label>
						  <label class="control-label text-danger">{{ $errors->first('P_phone') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" data-mask="(999) 999-9999" name="P_phone" id="P_phone" placeholder="(123) 555-6666" value="{{ Input::old('P_phone') }}">
						  </div>
						</div>
						<div class="form-group">
						  <label for="P_SSN" class="col-sm-2 control-label">SSN</label>
						  <label class="control-label text-danger">{{ $errors->first('P_SSN') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" data-mask="999-99-9999" name="P_SSN" id="P_SSN" placeholder="111-11-1111" value="{{ Input::old('P_SSN') }}">
						  </div>
						</div>
						<div class="form-group">
						  <label for="P_sex" class="col-sm-2 control-label">Sex</label>
						  <label class="control-label text-danger">{{ $errors->first('P_sex') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" name="P_sex" id="P_sex" placeholder="Sex" value="{{ Input::old('P_sex') }}">
						  </div>
						</div>
						<div class="form-group">
						  <label for="P_DOB" class="col-sm-2 control-label">Date of Birth</label>
						  <label class="control-label text-danger">{{ $errors->first('DOB') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" name="P_DOB" data-mask="99-99-9999" id="P_DOB" placeholder="MM-DD-YYYY" value="{{ Input::old('P_DOB') }}">
						  </div>
						</div>
						<div class="form-group">
						  <label for="P_DL" class="col-sm-2 control-label">Drivers License</label>
						  <label class="control-label text-danger">{{ $errors->first('P_DL') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" name="P_DL" id="P_DL" placeholder="Drivers License" value="{{ Input::old('P_DL') }}">
						  </div>
						</div>
						<div class="form-group">
						  <label for="P_alias" class="col-sm-2 control-label">Alias Names</label>
						  <label class="control-label text-danger">{{ $errors->first('P_alias1') }}</label>
						  <div class="col-sm-4">
						    <input type="text" class="form-control" name="P_alias1" id="P_alias1" placeholder="Alias" value="{{ Input::old('P_alias1') }}">
						    <label class="control-label text-danger">{{ $errors->first('P_alias2') }}</label>
						    <input type="text" class="form-control" name="P_alias2" id="P_alias2" placeholder="Alias" value="{{ Input::old('P_alias2') }}">
						  </div>
						</div>
						<a class="btn btn-default pull-left"data-toggle="collapse" data-parent="#accordion" href="#addCasetype">Previous Step</a>  
						<a class="btn btn-primary pull-right"data-toggle="collapse" data-parent="#accordion" href="#addDefendant">Next Step</a>
					</fieldset>
		      </div>
		    </div>
  </div><!-- / Add Plaintiff -->

  <!-- Add Defendant --><div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#addDefendant">
	          Add Defendant
	        </a>
	      </h4>
	    </div>
	    <div id="addDefendant" class="panel-collapse collapse">
	      <div class="panel-body">
	        <fieldset>
				    <!-- Address form -->
				
				    <!-- full-name input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">Full Name</label>
				        <label class="control-label text-danger">{{ $errors->first('D_full-name') }}</label>
				        <div class="col-sm-4">
				            <input id="full-name" name="D_full-name" type="text" placeholder="Personal or Business Name"
				            class="form-control" value="{{ Input::old('D_full-name') }}">
				            
				        </div>
				    </div>
				    <!-- address-line1 input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">Address Line 1</label>
				        <label class="control-label text-danger">{{ $errors->first('D_address-line1') }}</label>
				        <div class="col-sm-4">
				            <input id="D_address-line1" name="D_address-line1" type="text" placeholder="Street address, P.O. box, company name, c/o"
				            class="form-control" value="{{ Input::old('D_address-line1') }}">
				        </div>
				    </div>
				    <!-- address-line2 input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">Address Line 2</label>
				        <label class="control-label text-danger">{{ $errors->first('D_address-line2') }}</label>
				        <div class="col-sm-4">
				            <input id="D_address-line2" name="D_address-line2" type="text" placeholder="Apartment, suite , unit, building, floor, etc." class="form-control" value="{{ Input::old('D_address-line2') }}">
				        </div>
				    </div>
				    <!-- city input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">City</label>
				        <label class="control-label text-danger">{{ $errors->first('D_city') }}</label>
				        <div class="col-sm-4">
				            <input id="D_city" name="D_city" type="text" placeholder="city" class="form-control" value="{{ Input::old('D_city') }}">
				        </div>
				    </div>
				    <!-- region input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">State</label>
				        <label class="control-label text-danger">{{ $errors->first('D_state') }}</label>
				        <div class="col-sm-4">
				            <input id="D_state" name="D_state" type="text" placeholder="state" class="form-control" value="{{ Input::old('D_state') }}">
				        </div>
				    </div>
				    <!-- postal-code input-->
				    <div class="form-group">
				        <label class="col-sm-2 control-label">Zip / Postal Code</label>
				        <div class="col-sm-4">
				            <input id="D_postal-code" name="D_postal-code" type="text" placeholder="zip or postal code" class="form-control" value="{{ Input::old('D_postal-code') }}">
				        </div>
				    </div>
				
					<div class="form-group">
					  <label for="D_phone" class="col-sm-2 control-label">Phone</label>
					  <label class="control-label text-danger">{{ $errors->first('D_phone') }}</label>
					  <div class="col-sm-4">
					    <input type="text" class="form-control" data-mask="(999) 999-9999" name='D_phone' id="D_phone" placeholder="(123) 555-6666" value="{{ Input::old('D_phone') }}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="dssn" class="col-sm-2 control-label">SSN</label>
					  <label class="control-label text-danger">{{ $errors->first('D_SSN') }}</label>
					  <div class="col-sm-4">
					    <input type="text" data-mask="999-99-9999" class="form-control" name='D_SSN' id="dssn" placeholder="111-11-1111" value="{{ Input::old('D_SSN') }}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="dsex" class="col-sm-2 control-label">Sex</label>
					  <label class="control-label text-danger">{{ $errors->first('D_sex') }}</label>
					  <div class="col-sm-4">
					    <input type="text" class="form-control" name='D_sex' id="dsex" placeholder="Sex" value="{{ Input::old('D_sex') }}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="dDOB" class="col-sm-2 control-label">Date of Birth</label>
					  <label class="control-label text-danger">{{ $errors->first('D_DOB') }}</label>
					  <div class="col-sm-4">
					    <input type="text" class="form-control" name='D_DOB' id="ddob" data-mask="99-99-9999" placeholder="MM-DD-YYYY" value="{{ Input::old('D_DOB') }}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="dDL" class="col-sm-2 control-label">Drivers License</label>
					  <label class="control-label text-danger">{{ $errors->first('D_DL') }}</label>
					  <div class="col-sm-4">
					    <input type="text" class="form-control" name='D_DL' id="dDL" placeholder="Drivers License" value="{{ Input::old('D_DL') }}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="dalias" class="col-sm-2 control-label">Alias Names</label>
					  <label class="control-label text-danger">{{ $errors->first('D_alias1') }}</label>
					  <div class="col-sm-4">
					    <input type="text" class="form-control" name='D_alias1' id="dalias1" placeholder="Alias" value="{{ Input::old('D_alias1') }}">
					    <label class="control-label text-danger">{{ $errors->first('D_alias2') }}</label>
					    <input type="text" class="form-control" name='D_alias2' id="dalias2" placeholder="Alias" value="{{ Input::old('D_alias2') }}">
					  </div>
					</div>
					
					<a class="btn btn-default pull-left"data-toggle="collapse" data-parent="#accordion" href="#addPlaintiff">Previous Step</a>  
					<a class="btn btn-primary pull-right"data-toggle="collapse" data-parent="#accordion" href="#finish">Next Step</a>

			</fieldset>
	      </div>
	    </div>
  </div><!-- / Add Defendant -->

  <!-- Finish --><div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#finish">
	          Finish
	        </a>
	      </h4>
	    </div>
	    <div id="finish" class="panel-collapse collapse">
	      <div class="panel-body">
		        <fieldset>
		        	<a class="btn btn-default pull-left"data-toggle="collapse" data-parent="#accordion" href="#addDefendant">Previous Step</a>
			      	<p>{{ Form::submit('Open Case', ['class' => 'btn btn-success pull-right']) }}</p>
				</fieldset>
	      </div>
	    </div>
  </div><!-- / Finish -->
</div>

{{ Form::close() }}	
@stop

@section('js')
    {{ HTML::script('js/jquery.bootstrap.wizard.min.js') }}
    {{ HTML::script('js/vendor/jasny-bootstrap.min.js') }}
    
@stop