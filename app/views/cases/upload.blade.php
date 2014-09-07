@extends('layouts.master')

@section('title')
@parent
:: Upload
@stop

{{-- Content --}}
@section('content')
<h1>Upload a Document</h1>
<br />
{{ Form::open(['url' => Auth::user()->username.'/upload','class' => 'form-horizontal', 'files' => true]) }}
<fieldset>

	<div class="form-group">
	{{ Form::label('case_number', 'Case Number', ['class' => 'col-sm-2 control-label']) }}
	<label class="control-label text-danger">{{ $errors->first('case_number') }}</label>
    <div class="col-sm-5">{{ Form::select('case_number', [$case_number => $case_number], '', ['class' => 'form-control', 'name' => 'case_number']); }}</div>
	</div>

	<div class="form-group">
	{{ Form::label('document', 'Document', ['class' => 'col-sm-2 control-label']) }}
	<label class="control-label text-danger">{{ $errors->first('document') }}</label>
    <div class="col-sm-5">{{ Form::file('document[]', ['multiple' => true]) }}</div>
	</div>
	
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">{{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}</div>
	</div>
</fieldset>
{{ Form::close() }}


@stop