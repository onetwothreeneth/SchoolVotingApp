<div class="container">
	<div class="header">
		<div class="a">
			<img src="<?php echo e(URL::asset('img/logo.webp')); ?>">
		</div>
		<div class="b">
			<h5>SERGIO OSMENA SENIOR HIGHSCHOOL</h5> 
			<small>QUEZON CITY</small> 
			<p>SUPREME STUDENT GOVERNMENT</p>
			<small>
				<b>
					Candidate List		
				</b>
			</small>
		</div>
		<div class="c">
			<img src="<?php echo e(URL::asset('img/qc.jpg')); ?>">
		</div>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td>POSITION</td>
					<td>PARTYLIST</td>
					<td>LRN</td>
					<td>NAME</td>
					<td>ADDRESS</td>
					<td>PARENT</td>
					<td>EMAIL</td> 
				</tr>
			</thead>
			<tbody>
				<?php if($data): ?>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e(App\Models\Position::find($v['position_id'])->name); ?></td>
							<td><?php echo e($v['partylist']); ?></td> 
							<td><?php echo e(App\Models\Student::find($v['student_id'])->lrn); ?></td>
							<td><?php echo e(strtoupper(App\Models\Student::find($v['student_id'])->fname.' '.App\Models\Student::find($v['student_id'])->mname.' '.App\Models\Student::find($v['student_id'])->lname)); ?></td>
							<td><?php echo e(App\Models\Student::find($v['student_id'])->address); ?></td>
							<td><?php echo e(App\Models\Student::find($v['student_id'])->parent); ?></td>
							<td><?php echo e(App\Models\Student::find($v['student_id'])->email); ?></td> 
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php echo $__env->make('pages.reports.print.signatories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


<style type="text/css">
	.container{width: 100%;float: left;}
	.container .header{width: 90%;float: left; padding: 5%;}
	.container .header .a{width: 30%;float: left;}
	.container .header .a img{width: 7em;float: left;}
	.container .header .b{width: 40%;float: left;text-align: center;}
	.container .header .c{width: 30%;float: left;}
	.container .header .c img{width: 6em;float: right;}
	.container .content{width: 90%;float: left; padding: 5%;}
	.container .footer{width: 100%;float: left; padding-left: 5%; margin-top: 3%;}
	.container .footer .card{width: 20%; margin-left: 5%; margin-right: 5%; float: left; text-align: center;}
	table{width: 100%;float: left;}
	table,tr,td{border:1px solid #000063;}
	td{padding: 0.5%; text-align: center;}
	table thead tr{background-color: #000063; color:white;}
</style>

<script type="text/javascript">
	window.onload = function(){
		// window.print();
		// window.close();
	}
</script>
<?php /* /Users/mac/Desktop/gitlab/voting/resources/views/pages/reports/print/candidate.blade.php */ ?>