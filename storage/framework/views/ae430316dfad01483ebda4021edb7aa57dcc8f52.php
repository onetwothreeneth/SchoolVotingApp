 
<?php $__env->startSection('content'); ?>
	<div class="container">
		<form class="sign-in-form" method="post" action="<?php echo e(URL::route('forgot.verify')); ?>" style="margin-top: 100px;">
			<div class="card">
				<div class="card-body">
					<a class="brand text-center d-block m-b-20">
						<img src="<?php echo e(URL::asset('img/logo.webp')); ?>" alt="Segio Logo" width="30%" />
					</a>
					<h5 class="sign-in-heading text-center m-b-20">Forgot Password</h5>

					<?php echo $__env->make('errors.forms.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label for="inputEmail" class="sr-only">LRN</label>
						<input type="text" id="inputEmail" class="form-control" placeholder="LRN" required name="username" value="<?php echo e(old('username')); ?>">
					</div> 
					<button class="aa-bg btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Check</button>
				 	<p class="text-muted m-t-25 m-b-0 p-0">
				 		<center> 
							<a href="<?php echo e(URL::route('login')); ?>">Back to login</a>
							<br>
				 			Segio Voting &copy <?php echo e(date('Y')); ?>		
				 		</center>
				 	</p>
				</div>

			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/auth/forgot/index.blade.php */ ?>