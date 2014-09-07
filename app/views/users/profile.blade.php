@extends('layouts.master')

@section('title')
@parent
:: Profile
@stop

{{-- Content --}}
@section('content')
<h1>{{ Confide::user()->display_name }}'s Profile</h1>
<br />
{{ Form::open(['class' => 'form-horizontal']) }}
<fieldset>

	<div class="form-group">
	{{ Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">{{ Form::text('username', Auth::user()->username, ['class' => 'form-control', 'placeholder' => 'First Name', 'disabled']) }}</div>
	</div>

	<div class="form-group">
	{{ Form::label('display_name', 'Display Name', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-5">{{ Form::text('display_name', Auth::user()->display_name, ['class' => 'form-control', 'placeholder' => 'First Name']) }}</div>
	</div>

	<div class="form-group">
    {{ Form::label('bar_number', 'Bar Number', ['class' => 'col-sm-2 control-label']) }}
    <div class=" col-sm-5">{{ Form::text('bar_number', Auth::user()->bar_number, ['class' => 'form-control', 'placeholder' => '007']) }}</div>
	</div>
	
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}</div>
	</div>
</fieldset>
{{ Form::close() }}


@stop