 
<?php $__env->startSection('context'); ?>
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if(!App\Models\Schedule::available()): ?>
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD A SCHEDULE FIRST !</h2>
							</center>
						</div>
					</div>
				<?php else: ?>
					<div class="card">
						<h5 class="card-header">All records</h5>
						<div class="card-body">
							<div class="col-12">
								<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add" <?php echo e(Acl::disabled($title)); ?>>
									<i class="la la-plus" style="color: white;"></i>
									<small>ADD NEW</small>
								</button>
								<br><br>
							</div>
							<div class="table-responsivex">
								<table id="datatable" class="table table-borderlesxs table-stripxed">
									<thead>
										<tr>
											<th>ID</th> 
											<th>Level</th> 
											<th>Schedule</th> 
											<th>Status</th>
											<th>Updated at</th>  
											<th>Created at</th>  
											<th></th>  
										</tr>
									</thead>
									<tbody>
										<?php if($data): ?>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($v->id); ?></td> 
													<td><?php echo e($v->level); ?></td> 
													<td>
														<?php echo e(App\Models\Level::find($v->id)->schedule()); ?>

													</td> 
													<td>
														<span class="badge badge-success">Active</span>
													</td>
													<td><?php echo e($v->updated_at->diffForHumans()); ?></td>
													<td><?php echo e($v->created_at->diffForHumans()); ?></td> 
													<td>
														<div class="btn-group dropdown">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo e(Acl::disabled($title)); ?>>Action</button>
															<div class="dropdown-menu" x-placement="bottom-start"> 
																<a class="dropdown-item" data-toggle="modal" data-target="#update_<?php echo e($v->id); ?>">Update</a>  
																<a class="dropdown-item confirm-delete" href="<?php echo e(URL::route('level.delete',$v->id)); ?>">Delete</a> 
															</div>
														</div>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											<tr>
												<td colspan="7">
													<center>
														No data available
													</center>
												</td>
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('pages.level.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php if($data): ?>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('pages.level.modals.update',['params' => $v], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/level/index.blade.php */ ?>