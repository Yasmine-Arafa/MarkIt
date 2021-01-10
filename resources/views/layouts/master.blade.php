<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>@yield('title')</title>
    <!-- Bootstrap style --> 
        <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
        <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->	
        <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
        <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->	
        <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
        <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
        <style type="text/css" id="enject"></style>
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}


    </head>
    <body>
        <div id="header">
            <div class="container">
            <div id="welcomeLine" class="row">
                <div class="span6">Welcome!<strong> User</strong></div>
                <div class="span6">
                <div class="pull-right">
                    <a href="product_summary.html"><span class="">Fr</span></a>
                    <a href="product_summary.html"><span class="">Es</span></a>
                    <span class="btn btn-mini">En</span>
                    <a href="product_summary.html"><span>&pound;</span></a>
                    <span class="btn btn-mini">$155.00</span>
                    <a href="product_summary.html"><span class="">$</span></a>
                    <a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
                </div>
                </div>
            </div>
        @include('inc.nav')
        <div id="mainBody">
            <div class="container">
            <div class="row">
        @include('inc.sidebar')
            
            @yield('content')
        </div><!-- Container End -->
	    </div>
        
        @include('inc.footer')
        <script src="{{URL::to('/themes/js/jquery.js" type="text/javascript')}}"></script>
        <script src="{{URL::to('/themes/js/bootstrap.min.js" type="text/javascript')}}"></script>
        <script src="{{URL::to('/themes/js/google-code-prettify/prettify.js')}}"></script>
        <script src="{{URL::to('themes/js/bootshop.js')}}"></script>
        <script src="{{URL::to('themes/js/jquery.lightbox-0.5.js')}}"></script>
        
        

        
    
    </body>
</html>