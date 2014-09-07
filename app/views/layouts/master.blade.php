<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            KeFile
            @show
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS are placed here -->
        {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'); }}
        {{ HTML::style('css/style.css'); }}

        
        
        @section('styles')
        <!-- Page specific Styles -->
        @show
        
    </head>

    <body>

        <!-- Navbar -->
        @include('layouts.nav')
        
            
        <!-- Container -->
        <div class="container">

                
        <!-- Success-Messages -->
        @if ($message = Session::get('success'))
            <script type="text/javascript"> 
                window.setTimeout(function() { 
                    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ 
                        $(this).remove(); });
                }, 2000);
            </script>
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Success</h4>
            {{{ $message }}}</div><!--/alert alert-success alert-block -->
        @endif

        <!-- Error-Messages -->
        @if ($message = Session::get('error'))
            <script type="text/javascript"> 
                window.setTimeout(function() { 
                    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ 
                        $(this).remove(); });
                }, 2000);
            </script>
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Error</h4>
            {{{ $message }}}</div><!--/alert alert-success alert-block -->
        @endif
            

        <!-- Content -->
        @yield('content')
                
        
        
        </div><!-- /.container -->
        @include('layouts.footer')
    <!-- JavaScript plugins (requires jQuery) 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
    {{ HTML::script('//code.jquery.com/jquery-latest.js') }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'); }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js'); }}
    {{ HTML::script('js/vendor/bootstrap.file-input.js') }}
    @section('js')
        <!-- Page specific Javascript -->

    @show
 
    </body>
</html>