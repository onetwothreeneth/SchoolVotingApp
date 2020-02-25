@extends('layouts.main.index') 
@section('content')
	<div id="app"> 
		<aside class="sidebar sidebar-left">
			<div class="sidebar-content">
				<div class="aside-toolbar">
					<ul class="site-logo">
						<li> 
							<a> 
								<span class="brand-text">SERGIO VOTING</span>
							</a> 
						</li>
					</ul> 
				</div>

				<center>
					<img src="{{ URL::asset('img/logo.webp') }}" style="width: 40%; margin:10%;">
				</center>
				@include('navs.sidebar.groups.'.Auth::user()->type) 
			</div>
		</aside>

		<div class="content-wrapper">
			<nav class="top-toolbar navbar navbar-mobile navbar-tablet">
				<ul class="navbar-nav nav-left">
					<li class="nav-item">
						<a href="javascript:void(0)" data-toggle-state="aside-left-open">
							<i class="icon dripicons-align-left"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav nav-center site-logo">
					<li>
						<a> 
							<span class="brand-text">SERGIO VOTING</span>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav nav-right">
					<li class="nav-item">
						<a href="javascript:void(0)" data-toggle-state="mobile-topbar-toggle">
							<i class="icon dripicons-dots-3 rotate-90"></i>
						</a>
					</li>
				</ul>
			</nav>
			<nav class="top-toolbar navbar navbar-desktop flex-nowrap"> 
				<ul class="navbar-nav nav-right">  
					<!-- notifications.header.index -->
					@include('navs.header.index')
				</ul> 
			</nav> 
			<div class="content">
				<header class="page-header">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h1 class="separator">{{ $breadcrumbs['title'] }}</h1>
							<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html"><i class="icon {{ $breadcrumbs['icon'] }}"></i></a></li>
									<li class="breadcrumb-item"><a href="javascript:void(0)">{{ $breadcrumbs['main'] }}</a></li>
									@if(isset($breadcrumbs['sub']))
										<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumbs['sub'] }}</li>
									@endif
								</ol>
							</nav>
						</div>
					</div>
				</header>
				@yield('context')
			</div>   
		</div>
	</div>
@endsection
@section('extraCss')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('custom/css/datatable.css') }}">
@endsection
@section('extraJs')
	<script type="text/javascript" src="{{ URL::asset('custom/js/jquery.datatable.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('custom/js/bootstrap.datatable.js') }}"></script>
	<script type="text/javascript">
		(function(window, document, $, undefined) {
		  "use strict";
		    $(function() {

		      $('#datatable').DataTable();

		    });

		})(window, document, window.jQuery);
	</script>
	
	@yield('extraJsx')
@endsection