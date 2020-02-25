 
<?php $__env->startSection('context'); ?>
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
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
										<th>School Year</th> 
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
												<td>
													<?php echo e($v->sy_start); ?> - <?php echo e($v->sy_end); ?>

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
															<a class="dropdown-item confirm-delete" href="<?php echo e(URL::route('sy.delete',$v->id)); ?>">Delete</a> 
														</div>
													</div>
												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
										<tr>
											<td colspan="6">
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
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('pages.schoolyear.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/schoolyear/index.blade.php */ ?>