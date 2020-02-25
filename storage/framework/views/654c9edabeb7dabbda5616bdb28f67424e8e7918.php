 
<?php $__env->startSection('context'); ?>
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo e(URL::route('history.generate')); ?>" method="post" target="_blank">
							<?php echo e(csrf_field()); ?> 
							<h4>Choose school year</h4>
							<hr>
							<div class="col-12">
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">School Year</label> 
									<select class="form-control" name="sy"> 
										<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($v->id); ?>"><?php echo e($v->sy_start); ?> - <?php echo e($v->sy_end); ?></option>  	
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>  
								<div class="form-group radio col-12 col-xl-4"> 
									<input type="radio" name="type" value="Election Result" required>
									<label>Election Result</label> 
								</div>
								<div class="form-group radio col-12 col-xl-4"> 
									<input type="radio" name="type" value="Ballot" required>
									<label>Ballot</label> 
								</div>
								<div class="form-group col-12 col-xl-4">
									<button class="btn btn-primary">
										<i class="la la-eye" style="color:white"></i>
										View History
									</button>
								</div>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> 
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('extraCss'); ?>
	<style type="text/css">
		.radio { 
			width: 100%;
		}
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/history/index.blade.php */ ?>