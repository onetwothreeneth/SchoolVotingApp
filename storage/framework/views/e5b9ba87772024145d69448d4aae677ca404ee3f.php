<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add <?php echo e($title); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('schedule.add')); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Type</label>
						<select class="form-control" name="type"> 
							<option>AM</option> 	
							<option>PM</option> 	
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Start</label> 
						<input type="time" class="form-control" name="sched_start" required>  
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">End</label>
						<input type="time" class="form-control" name="sched_end" required>    
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/schedule/modals/add.blade.php */ ?>