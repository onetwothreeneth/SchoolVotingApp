<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sergio Voting | {{ $title }} </title>  
	<link rel="icon" href="{{ URL::asset('img/logo.webp') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/branding.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/metisMenu.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/index.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/jquery.mCustomScrollbar.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/line-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/dripicons.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/main.bundle.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/main.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/default.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('custom/css/theme-j.css') }}"> 
	<link rel="stylesheet" href="{{ URL::asset('custom/css/animate.css') }}"> 
</head>

<body>

	@yield('content') 

 	<script src="{{ URL::asset('custom/js/modernizr.custom.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/jquery.min.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/bootstrap.bundle.min.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/js.storage.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/js.cookie.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/metisMenu.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/index.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
 	<script src="{{ URL::asset('custom/js/angular.js') }}"></script>
 	@yield('extraJs')
 	<script src="{{ URL::asset('custom/js/app.js') }}"></script>  

	@include('notifications.resource.confirm')
	@include('notifications.resource.message')
	
 	@yield('extraCss')
</body> 
</html>
