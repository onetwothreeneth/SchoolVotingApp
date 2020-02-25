<?php

	/*	
	**	@param title string
	**	@param icon string 
	**	@param sub bolean
	**	
	**	if sub is false
	**	@param url string
	**
	**	If sub is true
	**  @param data array
	**
	**	Data has
	**	@param title string
	**	@param url string 
	*/
	$sidebar = [
		[
			"title" => "Dashboard",
			"icon"  => "la la-bar-chart-o", 
			"url"   => "dashboard"
		], 
		[
			"title" => "My Ballot",
			"icon"  => "la la-hand-pointer-o", 
			"url"   => "ballot"
		], 
		[
			"title" => "History",
			"icon"  => "la la-list", 
			"url"   => "history"
		], 
		[
			"title" => "Account Settings",
			"icon"  => "la la-user", 
			"url"   => "password"
		], 
		[
			"title" => "Logout",
			"icon"  => "la la-cog", 
			"url"   => "logout", 
		]
	];
?>
@include('navs.sidebar.index')