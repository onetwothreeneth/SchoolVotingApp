 
<?php $__env->startSection('context'); ?>
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if(!App\Models\Student::available()): ?>
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD STUDENTS FIRST !</h2>
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
											<th>School Year</th> 
											<th>Starts On</th>
											<th>Ends On</th>
											<th>Status</th>    
											<th></th>   
										</tr>
									</thead>
									<tbody>
										<?php if($data): ?>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($v->id); ?></td> 
													<td><?php echo e(App\Models\Election::find($v->id)->sy()); ?></td>   
													<td><?php echo e(Carbon\Carbon::parse($v->voting_start,'Asia/Singapore')->diffForHumans()); ?></td>   
													<td><?php echo e(Carbon\Carbon::parse($v->voting_end,'Asia/Singapore')->diffForHumans()); ?></td>   
													<td>
														<?php if(strtotime($v->voting_start) <= strtotime(Carbon\Carbon::now('Asia/Singapore'))): ?>
															<?php if(strtotime($v->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore'))): ?>	
																<span class="badge badge-success">STARTED</span>
															<?php else: ?>
																<span class="badge badge-warning">FINISHED</span>
															<?php endif; ?>
														<?php else: ?>
															<span class="badge badge-danger">PENDING</span> 
														<?php endif; ?>
													</td> 
													<td>
														<?php if(strtotime($v->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore'))): ?>	
															<div class="btn-group dropdown">
																<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																<div class="dropdown-menu" x-placement="bottom-start"> 
																	<a class="dropdown-item" data-toggle="modal" data-target="#update_<?php echo e($v->id); ?>">Update</a>  
																	<?php if(Acl::disabled($title) == 'access'): ?>
																	<a class="dropdown-item confirm-delete" href="<?php echo e(URL::route('election.delete',$v->id)); ?>">Delete</a> 
																	<?php endif; ?>
																</div>
															</div>
														<?php endif; ?>
														<a class="btn btn-success" href="<?php echo e(URL::route('partylist',$v->id)); ?>">
															<span style="color: white;">Manage</span>
															<i class="la la-cog" style="color: white;"></i>
														</a> 
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
 
	<?php echo $__env->make('pages.election.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php if($data): ?>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('pages.election.modals.update',['params' => $v], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/election/index.blade.php */ ?>