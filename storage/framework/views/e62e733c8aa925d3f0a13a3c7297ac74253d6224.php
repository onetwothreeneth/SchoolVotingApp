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
			"icon"  => "la la-area-chart", 
			"url"   => "dashboard"
		], 
		[
			"title" => "School Year",
			"icon"  => "la la-calendar-o", 
			"url"   => "sy"
		], 
		[
			"title" => "Schedule",
			"icon"  => "la la-hourglass", 
			"url"   => "schedule"
		], 
		[
			"title" => "Grade Level",
			"icon"  => "la la-bar-chart-o", 
			"url"   => "level"
		], 
		[
			"title" => "Section",
			"icon"  => "la la-university", 
			"url"   => "section"
		], 
		[
			"title" => "Position",
			"icon"  => "la la-line-chart", 
			"url"   => "position"
		], 
		[
			"title" => "Student",
			"icon"  => "la la-users", 
			"url"   => "student"
		], 
		[
			"title" => "Election",
			"icon"  => "la la-hand-pointer-o", 
			"url"   => "election"
		],  
		[
			"title" => "Reports",
			"icon"  => "la la-sitemap",  
			"url"   => "report" 
		],  
		[
			"title" => "Logout",
			"icon"  => "la la-cog", 
			"url"   => "logout", 
		]
	];    
	
?>	

<?php echo $__env->make('navs.sidebar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/navs/sidebar/groups/admin.blade.php */ ?>