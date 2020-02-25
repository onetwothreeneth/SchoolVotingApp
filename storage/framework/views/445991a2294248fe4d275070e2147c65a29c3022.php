<div class="modal fade" id="update_<?php echo e($params->id); ?>" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update <?php echo e($breadcrumbs['title']); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="<?php echo e(URL::route('partylist.update',[$election,$params->id])); ?>" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Partylist</label>
						<input type="text" class="form-control" name="name" required value="<?php echo e($params->name); ?>"> 
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Vision</label>
						<textarea class="form-control" name="vision" required rows="5"><?php echo e($params->vision); ?></textarea> 
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
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/partylist/modals/update.blade.php */ ?>