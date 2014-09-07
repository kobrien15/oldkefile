@extends('layouts.master')

@section('title')
@parent
:: Dashboard
@stop

@section('styles')
<style>.timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}
.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline > li {
  margin-bottom: 20px;
  position: relative;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li > .timeline-panel {
  width: 46%;
  float: left;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-left: 15px solid #ccc;
  border-right: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}
.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #fff;
  border-right: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}
.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 50%;
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
}
.timeline > li.timeline-inverted > .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 15px;
  left: -15px;
  right: auto;
}
.timeline > li.timeline-inverted > .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-badge.primary {
  background-color: #2e6da4 !important;
}
.timeline-badge.success {
  background-color: #3f903f !important;
}
.timeline-badge.warning {
  background-color: #f0ad4e !important;
}
.timeline-badge.danger {
  background-color: #d9534f !important;
}
.timeline-badge.info {
  background-color: #5bc0de !important;
}
.timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}
.timeline-body > p + p {
  margin-top: 5px;
}</style>
@stop

{{-- Content --}}
@section('content')
	<h1>Welcome back, {{ Confide::user()->display_name }}!</h1>

	<div class="container">
    <div class="page-header">
        <h1 id="timeline">Timeline</h1>
    </div>
    <ul class="timeline">
    @if (!count($user_cases))
      <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">No Cases Filed</h4>
            </div>
            <div class="timeline-body">
              <p>
                {{ link_to_route('case.create.create', 'Open One', null, ['class' => '']) }}
              </p>
            </div>
          </div>
      </li>
    @else
    @foreach (array_chunk($user_cases->all(), 1) as $user_caseRow)
          @foreach ($user_caseRow as $user_case)
              @foreach ($user_case->uploads as $user_case)
              <li class="timeline-inverted">
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-cloud-upload"></i></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4 class="timeline-title">{{ $user_case->orig_filename }} in <small>{{ link_to_route('case.casenumber.show', $user_case->case_number, [$user_case->case_number], ['class' => '']) }}</small></h4>
                      </div>
                      <div class="timeline-body">
                        <p>
                          <a href="{{ $user_case->path }}">View / Download</a>
                        </p>
                      </div>
                    </div>
                  </li>
              @endforeach
          @foreach($user_caseRow as $user_case)
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-folder-open"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="timeline-title">{{ $user_case->case_caption }}</h4>
                  <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{ $user_case->created_at }}</small></p>
                </div>
                <div class="timeline-body">
                  <p>
                    {{ link_to_route('case.casenumber.show', $user_case->case_number, [$user_case->case_number], ['class' => '']) }} <br />  
                    {{ $user_case->type }} <br /> 
                    {{ link_to_route('case.casenumber.upload', 'File Document', [$user_case->case_number], ['class' => 'btn btn-primary btn-small']) }}
                  </p>
                </div>
              </div>
            </li>
            @endforeach
          @endforeach
      @endforeach
    @endif
    </ul>
</div>

@stop