<li class="nav-item dropdown">
	<a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<?php if(!is_null(Auth::user()->img)): ?>
			<img src="<?php echo e(URL::asset('uploads/profile/'.Auth::user()->img)); ?>" class="w-35 rounded-circle">
		<?php else: ?>
			<img src="<?php echo e(URL::asset('img/default.png')); ?>" class="w-35 rounded-circle">
		<?php endif; ?>
	</a>
	<div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
		<div class="dropdown-header pb-3">
			<div class="media d-user">
				<?php if(!is_null(Auth::user()->img)): ?>
					<img class="align-self-center mr-3 w-40 rounded-circle" src="<?php echo e(URL::asset('uploads/profile/'.Auth::user()->img)); ?>">
				<?php else: ?>
					<img class="align-self-center mr-3 w-40 rounded-circle" src="<?php echo e(URL::asset('img/default.png')); ?>">
				<?php endif; ?>
				<div class="media-body">
					<h5 class="mt-0 mb-0"><?php echo e(ucfirst(Auth::user()->name)); ?></h5>
					<span>
						<?php echo e(ucfirst(Auth::user()->type)); ?>

					</span>
				</div>
			</div>
		</div>  
		<div class="dropdown-divider"></div> 
		<a class="dropdown-item" href="<?php echo e(URL::route('logout')); ?>"><i class="icon dripicons-lock-open"></i> Sign Out</a>
	</div>
</li>  
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/navs/header/index.blade.php */ ?>