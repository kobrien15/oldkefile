@extends('layouts.master')

@section('title')
@parent
:: Cases List
@stop

{{-- Content --}}
{{-- Content --}}
@section('content')
    <div class="page-header">
        @if (Confide::user()->display_name != '')
        <h1>{{ Confide::user()->display_name }}'s Cases</h1>
        @else
        <h1>{{ Confide::user()->username }}'s Cases</h1>
        @endif
    </div>

    @if (!count($cases))
        <p class="well well-sm">You have no open cases.
            {{ link_to_route('case.create.create', 'File One', null, ['class' => '']) }} 
        </p>
    @else
    <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading"><h4>Your Cases</h4></div>
      <!-- Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Case Number</th>
                    <th>Type</th>
                    <th>Filings</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                <tr>
                    <!-- <td>{{ HTML::link('/case/'.$case->case_number, $case->case_number, ['class' => ''] ) }}</td> -->
                    <td>{{ link_to_route('case.casenumber.show', $case->case_number, [$case->case_number], ['class' => '']) }}</td>
                    <td>{{ $case->type }}</td>
                    <td>{{ $case->uploads->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- End .panel -->
    @endif
    

@stop