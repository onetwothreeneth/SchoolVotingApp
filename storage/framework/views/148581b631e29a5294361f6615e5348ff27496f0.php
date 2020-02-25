<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('student.add')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">School Year</label> 
						<select class="form-control" name="sy"> 
							<?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($v->id); ?>"><?php echo e($v->sy_start); ?> - <?php echo e($v->sy_end); ?></option>  	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Section</label> 
						<select class="form-control" name="section"> 
							<?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>  	
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">LRN</label>
						<input type="number" class="form-control" name="lrn" min="11" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">First Name</label>
						<input type="text" class="form-control" name="fname" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Middle Name</label>
						<input type="text" class="form-control" name="mname" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Last Name</label>
						<input type="text" class="form-control" name="lname" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Gender</label> 
						<select class="form-control" name="gender">  
							<option value="M">M</option>  	
							<option value="F">F</option>  	
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">Address</label>
						<textarea rows="4" class="form-control" name="address" required></textarea>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Parent name</label>
						<input type="text" class="form-control" name="parent" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Birthday (this will be the default password)</label>
						<input type="date" class="form-control" name="birthday" required>
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/student/modals/add.blade.php */ ?>