<div class="modal fade" id="update_<?php echo e($params->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('level.update',$params->id)); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Level</label>
						<select class="form-control" name="level"> 
							<option <?php if($params->level == '7'): ?> selected <?php endif; ?>>7</option> 	
							<option <?php if($params->level == '8'): ?> selected <?php endif; ?>>8</option> 	
							<option <?php if($params->level == '9'): ?> selected <?php endif; ?>>9</option> 	
							<option <?php if($params->level == '10'): ?> selected <?php endif; ?>>10</option>  
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Schedule</label> 
						<select class="form-control" name="schedule_id"> 
							<?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php if($params->schedule_id == $v->id): ?> selected <?php endif; ?> value="<?php echo e($v->id); ?>">
									<?php echo e($v->sched_start); ?> - <?php echo e($v->sched_end); ?> <?php echo e($v->type); ?>

								</option>  	
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/level/modals/update.blade.php */ ?>