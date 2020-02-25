<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($breadcrumbs['title']); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('candidate.add',[$party])); ?>" method="post" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label class="control-label">Student <small>(search by LRN)</small></label> 
						<select class="form-control col-12" id="s2_demo1" name="student">
							<?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(!in_array($v->id,$candidates)): ?>
									<option value="<?php echo e($v->id); ?>">
										<?php echo e($v->lrn); ?> -
										<?php echo e(strtoupper($v->fname)); ?> 
										<?php echo e(strtoupper($v->mname)); ?> 
										<?php echo e(strtoupper($v->lname)); ?>

										(Grade <?php echo e(App\Models\Level::find(App\Models\Section::find($v->section_id)['gradelevel_id'])['level']); ?>)
									</option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select> 
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Position</label>
						<select class="form-control" name="position">
							<?php $__currentLoopData = $position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(!in_array($v->id,$positions)): ?>
									<option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Intro</label>
						<textarea class="form-control" name="intro" required rows="5"></textarea>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">G.P.A</label>
						<input type="text" class="form-control" name="gpa" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">COC</label>
						<input type="file" class="form-control" name="file_coc" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Form 137</label>
						<input type="file" class="form-control" name="file_grade" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Good moral</label>
						<input type="file" class="form-control" name="file_goodmoral" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Parents Consent</label>
						<input type="file" class="form-control" name="file_consent" required>
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/candidate/modals/add.blade.php */ ?>