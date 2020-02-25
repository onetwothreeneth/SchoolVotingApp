<div class="col-md-6">
	<div class="card">
		<h5 class="card-header">Your Voting form</h5>
		<form action="<?php echo e(URL::route('ballot.vote')); ?>" method="post">
			<?php echo e(csrf_field()); ?>

			<div class="card-body"> 
				<?php if($data): ?>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(count($v['data']) != 0): ?>
							<p class="f-w-400 font-size-16  m-t-20"><b><?php echo e($v['position']); ?></b></p>
							<hr>
							<?php $__currentLoopData = $v['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $can): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="form-checxk">
									<input type="radio" name="vote['<?php echo e($v['position_id']); ?>']" value="<?php echo e($can['candidate_id']); ?>">
									<label> 
										<?php echo e(strtoupper($can['details']['name'])); ?>

										<small>(<?php echo e(App\Models\Partylist::find(App\Models\Candidate::find($can['candidate_id'])->partylist_id)->name); ?>)</small>
									</label>
								</div> 
								<br>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</div> 
			<hr>
			<div class="col-12">
				<button class="btn btn-success pull-right confirm-vote">
					SUBMIT VOTE
				</button>
				<a class="btn btn-primary pull-right" style="color: white; margin-right: 2%;" data-toggle="modal" data-target="#partylist">
					VOTE PARTYLIST
				</a>
			</div><br><br>
		</form>
	</div>
</div>
<?php echo $__env->make('pages.ballot.modals.partylist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('extraJsx'); ?>
	<script type="text/javascript">
		$('body .confirm-vote').click(function(){ 
			if(!window.confirm("Are you sure you want to submit your vote ?")){
				return false;
			}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/ballot/form.blade.php */ ?>