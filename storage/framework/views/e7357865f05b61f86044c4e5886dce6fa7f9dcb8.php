<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('level.add')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Level</label>
						<select class="form-control" name="level"> 
							<option>7</option> 	
							<option>8</option> 	
							<option>9</option> 	
							<option>10</option>  
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Schedule</label> 
						<select class="form-control" name="schedule_id"> 
							<?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($v->id); ?>"><?php echo e(date('h:i A',strtotime($v->sched_start))); ?> - <?php echo e(date('h:i A',strtotime($v->sched_end))); ?></option>  	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div> 
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary btn-outline" data-dismiss="modal">Close</a>
					<button class="btn btn-primary confirm-save">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/level/modals/add.blade.php */ ?>