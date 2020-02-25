<?php if(isset($sidebar)): ?>
	<nav class="main-menu">
		<ul class="nav metismenu">
			<li class="sidebar-header"><span>NAVIGATION</span></li> 
			<?php $__currentLoopData = $sidebar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(isset($value['sub']) && $value['sub'] == true): ?>
					<li class="nav-dropdown <?php if(@$active && @$active === $value['title']): ?> active <?php endif; ?>">
						<a class="has-arrow" href="#" aria-expanded="false"><i class="<?php echo e($value['icon']); ?>"></i><span><?php echo e($value['title']); ?></span></a>
						<ul class="collapse nav-sub" aria-expanded="false">
							<?php $__currentLoopData = $value['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="<?php echo e(URL::route($v['url'])); ?>">
										<span><?php echo e($v['title']); ?></span>
													
										<?php if(Auth::user()->type == 'admin'): ?>
											<?php if(Acl::status()): ?>
												<?php if(in_array($v['title'],Acl::locked())): ?>
													<span class="pull-right"><i class="la la-lock"></i></span>
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									</a>
								</li> 
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</li>  
				<?php else: ?>
					<li class="<?php if(@$active == $value['title']): ?> active <?php endif; ?>">
						<a href="<?php echo e(URL::route($value['url'])); ?>">
							<i class="<?php echo e($value['icon']); ?>"></i>
							<span><?php echo e($value['title']); ?></span>
							
							<?php if(Auth::user()->type == 'admin'): ?>
								<?php if(Acl::status()): ?>
									<?php if(in_array($value['title'],Acl::locked())): ?>
										<span class="pull-right"><i class="la la-lock"></i></span>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>
						</a>
					</li>  
				<?php endif; ?> 
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</nav> 
<?php endif; ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/navs/sidebar/index.blade.php */ ?>