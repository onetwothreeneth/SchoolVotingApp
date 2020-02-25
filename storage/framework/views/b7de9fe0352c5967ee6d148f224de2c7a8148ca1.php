<div class="modal fade" id="update_<?php echo e($params->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('election.update',$params->id)); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">School Year</label> 
						<select class="form-control" name="sy"> 
							<?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php if($v->id == $params->schoolyear): ?> selected <?php endif; ?> value="<?php echo e($v->id); ?>"><?php echo e($v->sy_start); ?> - <?php echo e($v->sy_end); ?></option>  	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Voting Start</label>
						<input type="date" class="form-control" name="voting_start" required value="<?php echo e($params->voting_start); ?>" min="<?php echo e(date('Y-m-d',strtotime(Carbon\Carbon::now('Asia/Singapore')))); ?>">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Voting End</label>
						<input type="date" class="form-control" name="voting_end" required value="<?php echo e($params->voting_end); ?>" min="<?php echo e(date('Y-m-d',strtotime(Carbon\Carbon::now('Asia/Singapore')))); ?>">
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/election/modals/update.blade.php */ ?>