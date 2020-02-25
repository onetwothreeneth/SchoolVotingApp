 
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
							<?php if(strtotime(App\Models\Election::find(App\Models\Partylist::find($party)->election_id)->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore'))): ?>		
								<div class="col-12">
									<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add" <?php echo e(Acl::disabled($title)); ?>>
										<i class="la la-plus" style="color: white;"></i>
										<small>ADD NEW</small>
									</button>
									<br><br>
								</div>
							<?php endif; ?>
							<div class="table-responsivex">
								<table id="datatable2" class="table table-borderlesxs table-stripxed">
									<thead>
										<tr>
											<th></th> 
											<th>Student</th> 
											<th>Position</th>
											<th>Intro</th>
											<th>GPA</th>
											<th>Requirements</th> 
											<th></th>  
										</tr>
									</thead>
									<tbody>
										<?php if($data): ?>
											<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td style="width: 5%;">
														<img src="<?php echo e(URL::asset('uploads/profile/'.$v->photo)); ?>" width="100%">
													</td> 
													<td>
														<?php echo e(strtoupper(App\Models\Student::find($v->student_id)->fname)); ?>

														<?php echo e(strtoupper(App\Models\Student::find($v->student_id)->mname)); ?>

														<?php echo e(strtoupper(App\Models\Student::find($v->student_id)->lname)); ?>

														<br>
														<b> 
															<small>LRN :</small>
															<?php echo e(strtoupper(App\Models\Student::find($v->student_id)->lrn)); ?>

														</b>
													</td>  
													<td><?php echo e(strtoupper(App\Models\Position::find($v->position_id)->name)); ?></td>  
													<td><?php echo e($v->intro); ?></td>  
													<td><?php echo e($v->gpa); ?></td>  
													<td>
														<a download target="_blank" href="<?php echo e(URL::asset('uploads/files/'.$v->file_coc)); ?>">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> COC</span>
														</a>
														<a download target="_blank" href="<?php echo e(URL::asset('uploads/files/'.$v->file_grade)); ?>">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Form 137</span>
														</a>
														<a download target="_blank" href="<?php echo e(URL::asset('uploads/files/'.$v->file_goodmoral)); ?>">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Goodmoral</span>
														</a>
														<a download target="_blank" href="<?php echo e(URL::asset('uploads/files/'.$v->file_consent)); ?>">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Consent</span>
														</a><br>
													</td> 
													<td> 
														<?php if(strtotime(App\Models\Election::find(App\Models\Partylist::find($party)->election_id)->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore'))): ?>	
														<div class="btn-group dropdown">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php echo e(Acl::disabled($title)); ?>>Action</button>
															<div class="dropdown-menu" x-placement="bottom-start"> 
																<a class="dropdown-item" data-toggle="modal" data-target="#update_<?php echo e($v->id); ?>">Update</a>  
																<a class="dropdown-item confirm-delete" href="<?php echo e(URL::route('candidate.delete',[$party,$v->id])); ?>">Delete</a> 
															</div>
														</div> 
														<?php else: ?>
															<small>ELECTION FINISHED</small>
														<?php endif; ?>
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

	<?php echo $__env->make('pages.candidate.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php if($data): ?>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('pages.candidate.modals.update',['params' => $v], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('extraCss'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('custom/css/select2.css')); ?>">
	<style type="text/css">
		.modal .select2{
			width: 100% !important; 
		}
		.pagination,.dataTables_filter{
			float: right;
		}
		.badge{
			margin-bottom: 2%;
		}
	</style>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('extraJsx'); ?>
	<script type="text/javascript" src="<?php echo e(URL::asset('custom/js/select2.js')); ?>"></script>
	<script type="text/javascript"> 
		$('#datatable2').DataTable({ 
		  	drawCallback: function() {
				$("#s2_demo1").select2();
				$('.modal').removeAttr('tabindex')
		  	}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/candidate/index.blade.php */ ?>