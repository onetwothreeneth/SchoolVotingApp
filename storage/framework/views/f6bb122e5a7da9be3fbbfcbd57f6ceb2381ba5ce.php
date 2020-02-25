<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('sy.add')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">SY</label>
						<select class="form-control" name="sy">
							<?php for($i=0; $i <= 4; $i++): ?>
								<option>
									<?php if($i == 0): ?>
										<?php echo e(date('Y',strtotime(date('Y-m-d')))); ?> -
									<?php else: ?> 
										<?php echo e(date('Y',strtotime(date('Y-m-d').' +'.$i.' years'))); ?> -
									<?php endif; ?>
									<?php echo e(date('Y',strtotime(date('Y-m-d').' +'.($i+1).' years'))); ?> 
								</option>
							<?php endfor; ?>
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/schoolyear/modals/add.blade.php */ ?>