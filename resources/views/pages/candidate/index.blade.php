@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				@if(!App\Models\Schedule::available())
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD A SCHEDULE FIRST !</h2>
							</center>
						</div>
					</div>
				@else
					<div class="card">
						<h5 class="card-header">All records</h5>
						<div class="card-body">
							@if(strtotime(App\Models\Election::find(App\Models\Partylist::find($party)->election_id)->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore')))		
								<div class="col-12">
									<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add" {{ Acl::disabled($title) }}>
										<i class="la la-plus" style="color: white;"></i>
										<small>ADD NEW</small>
									</button>
									<br><br>
								</div>
							@endif
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
										@if($data)
											@foreach($data as $key => $v)
												<tr>
													<td style="width: 5%;">
														<img src="{{ URL::asset('uploads/profile/'.$v->photo) }}" width="100%">
													</td> 
													<td>
														{{ strtoupper(App\Models\Student::find($v->student_id)->fname) }}
														{{ strtoupper(App\Models\Student::find($v->student_id)->mname) }}
														{{ strtoupper(App\Models\Student::find($v->student_id)->lname) }}
														<br>
														<b> 
															<small>LRN :</small>
															{{ strtoupper(App\Models\Student::find($v->student_id)->lrn) }}
														</b>
													</td>  
													<td>{{ strtoupper(App\Models\Position::find($v->position_id)->name) }}</td>  
													<td>{{ $v->intro }}</td>  
													<td>{{ $v->gpa }}</td>  
													<td>
														<a download target="_blank" href="{{ URL::asset('uploads/files/'.$v->file_coc) }}">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> COC</span>
														</a>
														<a download target="_blank" href="{{ URL::asset('uploads/files/'.$v->file_grade) }}">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Form 137</span>
														</a>
														<a download target="_blank" href="{{ URL::asset('uploads/files/'.$v->file_goodmoral) }}">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Goodmoral</span>
														</a>
														<a download target="_blank" href="{{ URL::asset('uploads/files/'.$v->file_consent) }}">
															<span class="badge badge-success"><i class="la la-download" style="color: white;"></i> Consent</span>
														</a><br>
													</td> 
													<td> 
														@if(strtotime(App\Models\Election::find(App\Models\Partylist::find($party)->election_id)->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore')))	
														<div class="btn-group dropdown">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" {{ Acl::disabled($title) }}>Action</button>
															<div class="dropdown-menu" x-placement="bottom-start"> 
																<a class="dropdown-item" data-toggle="modal" data-target="#update_{{ $v->id }}">Update</a>  
																<a class="dropdown-item confirm-delete" href="{{ URL::route('candidate.delete',[$party,$v->id]) }}">Delete</a> 
															</div>
														</div> 
														@else
															<small>ELECTION FINISHED</small>
														@endif
													</td>
												</tr>
											@endforeach
										@else
											<tr>
												<td colspan="7">
													<center>
														No data available
													</center>
												</td>
											</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	@include('pages.candidate.modals.add')
	@if($data)
		@foreach($data as $key => $v)
			@include('pages.candidate.modals.update',['params' => $v])
		@endforeach
	@endif
@endsection 
@section('extraCss')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('custom/css/select2.css') }}">
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
@endsection 
@section('extraJsx')
	<script type="text/javascript" src="{{ URL::asset('custom/js/select2.js') }}"></script>
	<script type="text/javascript"> 
		$('#datatable2').DataTable({ 
		  	drawCallback: function() {
				$("#s2_demo1").select2();
				$('.modal').removeAttr('tabindex')
		  	}
		});
	</script>
@endsection