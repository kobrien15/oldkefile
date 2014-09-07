@extends('layouts.master')

@section('title')
@parent
:: New Case
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Case Detail <small>{{ $case->case_caption }} | {{ $case->case_number }} |  {{ $case->type }} | {{ link_to_route('case.casenumber.upload', 'File Document', [$case->case_number], ['class' => 'btn btn-primary btn-small']) }}</small></h1>
</div>


   <!--  <pre> 
                        IN THE [DISTRICT COURT] OF [COUNTY], [KANSAS]

            In the Matter of the [case type] of        )
                                                       )
                            Party::whereID()               )   Case No. [YY-CT-001]
                            and                        )   Division 3  
                            [DEF/RESPOND]              )
    </pre> -->


@if (!count($case->uploads))
    <p class="well well-sm">There are no filings for {{ $case->case_number }}. 
        {{ link_to_route('case.casenumber.upload', 'File One', [$case->case_number], ['class' => '']) }}
    </p>
@else
    <table class="table table-striped">
        <thead>
            <tr><h4>Filings</h4></tr>
            <tr>
                <th>Case Number</th>
                <th>Document</th>
                <th>Filing Date</th>
                <th>Filed By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($case->uploads as $case->upload)
            <tr>
                <td>{{ $case->case_number }}</td>
                <td><a href="{{ $case->upload->path }}">{{ $case->upload->orig_filename }}</a></td>
                <td>{{ $case->upload->created_at }}</td>
                <td>{{ $case->upload->filed_by }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif


@stop