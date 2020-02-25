<div class="modal fade" id="update_<?php echo e($params->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('student.update',$params->id)); ?>" method="post">
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
						<label for="demoTextInput1">Section</label> 
						<select class="form-control" name="section"> 
							<?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option <?php if($v->id == $params->section_id): ?> selected <?php endif; ?> value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>  	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">LRN</label>
						<input type="number" disabled class="form-control" name="lrn" required value="<?php echo e($params->lrn); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Email</label>
						<input type="email" class="form-control" name="email" required value="<?php echo e($params->email); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">First Name</label>
						<input type="text" class="form-control" name="fname" required value="<?php echo e($params->fname); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Middle Name</label>
						<input type="text" class="form-control" name="mname" required value="<?php echo e($params->mname); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Last Name</label>
						<input type="text" class="form-control" name="lname" required value="<?php echo e($params->lname); ?>">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Gender</label> 
						<select class="form-control" name="gender">  
							<option <?php if($params == 'M'): ?> selected <?php endif; ?> value="M">M</option>  	
							<option <?php if($params == 'F'): ?> selected <?php endif; ?> value="F">F</option>  	
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">Address</label>
						<textarea rows="4" class="form-control" name="address" required><?php echo e($params->address); ?></textarea>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Parent name</label>
						<input type="text" class="form-control" name="parent" required value="<?php echo e($params->parent); ?>">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Birthday (this will be the default password, will not be overwrited when leaved blank)</label>
						<input type="date" class="form-control" name="birthday">
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/student/modals/update.blade.php */ ?>