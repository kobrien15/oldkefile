<!-- 

    NAVIGATION TEMPLATE

                            -->


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        @if ( Auth::guest() )
        <a class="navbar-brand" href="{{{ URL::to('') }}}">KeFile</a>
        @else
        {{ HTML::link('/'.Auth::user()->username, 'Kefile', array('class' => 'navbar-brand') ) }}
        @endif
    </div><!-- /navbar-header -->
                 
     @if( Auth::user() )
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
                            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Actions <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <!-- dropdown menu links -->
                <li>{{ link_to_route('case.create.create', 'Open New Case', null, ['class' => '']) }}</li>
                <li>{{ link_to_route('username.cases.index', 'My Cases', Auth::user()->username, ['class' => '']) }}</li>
                {{-- <li class="divider"></li> --}}
                <li>{{ link_to_route('username.upload.create', 'File Document', Auth::user()->username, ['class' => '']) }}</li>
              </ul>
            </li>                            
        </ul><!--/nav navbar-nav -->

       
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> </span>   
            @if (Confide::user()->display_name != '')
                {{ Confide::user()->display_name }}
            @else
                {{ Confide::user()->username }}
            @endif 
            <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!-- dropdown menu links -->
                    <li>{{ link_to_route('username.profile.show', 'Profile', Auth::user()->username, ['class' => '']) }}</li>
                    <li class="divider"></li>
                    <li>{{ link_to_route('logout', ' Logout', null, ['class' => '']) }}</li>
                </ul>
            </li>
        </ul>
        @else
        @endif
        

    </div>

                    
        
</div>