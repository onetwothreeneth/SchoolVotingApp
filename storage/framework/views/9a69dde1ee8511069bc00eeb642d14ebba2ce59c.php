<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sergio Voting | <?php echo e($title); ?> </title>  
	<link rel="icon" href="<?php echo e(URL::asset('img/logo.webp')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/branding.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/fonts.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/metisMenu.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/index.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/jquery.mCustomScrollbar.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/line-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/dripicons.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/material-design-iconic-font.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/main.bundle.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/main.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/default.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/theme-j.css')); ?>"> 
	<link rel="stylesheet" href="<?php echo e(URL::asset('custom/css/animate.css')); ?>"> 
</head>

<body>

	<?php echo $__env->yieldContent('content'); ?> 

 	<script src="<?php echo e(URL::asset('custom/js/modernizr.custom.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/jquery.min.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/bootstrap.bundle.min.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/js.storage.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/js.cookie.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/metisMenu.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/index.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
 	<script src="<?php echo e(URL::asset('custom/js/angular.js')); ?>"></script>
 	<?php echo $__env->yieldContent('extraJs'); ?>
 	<script src="<?php echo e(URL::asset('custom/js/app.js')); ?>"></script>  

	<?php echo $__env->make('notifications.resource.confirm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('notifications.resource.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
 	<?php echo $__env->yieldContent('extraCss'); ?>
</body> 
</html>

<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/layouts/main/index.blade.php */ ?>