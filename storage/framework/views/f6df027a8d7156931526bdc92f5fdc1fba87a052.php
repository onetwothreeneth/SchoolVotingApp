 
<?php $__env->startSection('context'); ?>
	<section class="page-content container-fluid">
		<div class="row">
			<?php if(Acl::status()): ?>   
				<?php if(Acl::isVoted()): ?> 
					<?php if(Acl::isSchedule() == 'true'): ?>
						<?php echo $__env->make('pages.ballot.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
					<?php else: ?>
						<div class="col-12">
							<div class="card"> 
								<div class="card-body">
									<center>
										<br> 
										<p>YOUR VOTING SCHEDULE IS <?php echo e(Acl::isSchedule()); ?></p>
									</center>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php else: ?> 
					<div class="col-12">
						<div class="card"> 
							<div class="card-body">
								<center>
									<br> 
									<p>YOUR HAVE SUBMITTED YOUR VOTE !</p>
								</center>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php elseif(Acl::comming() != false): ?>
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h1 id="counter"> <?php echo e(date('M d, Y',strtotime(Acl::comming()))); ?></h1>
								<p>BEFORE ELECTION STARTS</p>
							</center>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>NO UPCOMMING ELECTION !</h2>
							</center>
						</div>
					</div>
				</div>
			<?php endif; ?> 
		</div>
	</section> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/ballot/index.blade.php */ ?>