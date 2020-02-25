<div class="modal fade" id="update_<?php echo e($params->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('position.update',$params->id)); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Position</label>
						<input type="text" class="form-control" name="name" required value="<?php echo e($params->name); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Eligibility</label> 
						<select class="form-control" name="eligibility"> 
							<option <?php if($params->eligibility == 'all'): ?> selected <?php endif; ?> value="all">All *</option>
							<?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php if($params->eligibility == $v->id): ?> selected <?php endif; ?> value="<?php echo e($v->id); ?>"><?php echo e($v->level); ?></option>  	
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/position/modals/update.blade.php */ ?>