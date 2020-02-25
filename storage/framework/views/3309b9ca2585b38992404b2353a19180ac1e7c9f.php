 
<?php $__env->startSection('content'); ?>
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
					<img src="<?php echo e(URL::asset('img/logo.webp')); ?>" style="width: 40%; margin:10%;">
				</center>
				<?php echo $__env->make('navs.sidebar.groups.'.Auth::user()->type, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
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
					<?php echo $__env->make('navs.header.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</ul> 
			</nav> 
			<div class="content">
				<header class="page-header">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h1 class="separator"><?php echo e($breadcrumbs['title']); ?></h1>
							<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html"><i class="icon <?php echo e($breadcrumbs['icon']); ?>"></i></a></li>
									<li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo e($breadcrumbs['main']); ?></a></li>
									<?php if(isset($breadcrumbs['sub'])): ?>
										<li class="breadcrumb-item active" aria-current="page"><?php echo e($breadcrumbs['sub']); ?></li>
									<?php endif; ?>
								</ol>
							</nav>
						</div>
					</div>
				</header>
				<?php echo $__env->yieldContent('context'); ?>
			</div>   
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extraCss'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('custom/css/datatable.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extraJs'); ?>
	<script type="text/javascript" src="<?php echo e(URL::asset('custom/js/jquery.datatable.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(URL::asset('custom/js/bootstrap.datatable.js')); ?>"></script>
	<script type="text/javascript">
		(function(window, document, $, undefined) {
		  "use strict";
		    $(function() {

		      $('#datatable').DataTable();

		    });

		})(window, document, window.jQuery);
	</script>
	
	<?php echo $__env->yieldContent('extraJsx'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/layouts/page/index.blade.php */ ?>