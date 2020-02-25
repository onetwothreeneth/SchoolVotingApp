@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				@if(!App\Models\Section::available())
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD A SECTION FIRST !</h2>
							</center>
						</div>
					</div>
				@else
					<div class="card">
						<h5 class="card-header">All records</h5>
						<div class="card-body">
							<div class="col-12">
								<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add" {{ Acl::disabled($title) }}>
									<i class="la la-plus" style="color: white;"></i>
									<small>ADD NEW</small>
								</button>
								<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#import" {{ Acl::disabled($title) }} style="margin-right: 1%;">
									<i class="la la-upload" style="color: white;"></i>
									<small>IMPORT</small>
								</button>
								<br><br>
							</div>
							<div class="table-responsivex">
								<table id="datatable" class="table table-borderlesxs table-stripxed">
									<thead>
										<tr>
											<th>ID</th> 
											<th>LRN</th> 
											<th>Fullname</th>
											<th>School Year</th>
											<th>Section</th>  
											<th>Account Activation</th>  
											<th></th>  
										</tr>
									</thead>
									<tbody>
										@if($data)
											@foreach($data as $key => $v)
												<tr>
													<td>{{ $v->id }}</td> 
													<td>{{ $v->lrn }}</td> 
													<td>
														{{ strtoupper($v->fname) }}
														{{ strtoupper($v->mname) }}
														{{ strtoupper($v->lname) }}
													</td>
													<td>{{ App\Models\Student::find($v->id)->sy() }}</td>
													<td>{{ App\Models\Student::find($v->id)->section() }}</td>
													<td>
														@if($v->active == 1)
															<span class="badge badge-success">ACTIVE</span>
														@else
															<span class="badge badge-danger">PENDING</span> 
														@endif
													</td> 
													<td>
														<div class="btn-group dropdown">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" {{ Acl::disabled($title) }}>Action</button>
															<div class="dropdown-menu" x-placement="bottom-start"> 
																@if($v->active == 1)
																	<a class="dropdown-item confirm-reset" href="{{ URL::route('student.reset',$v->id) }}">Reset Password</a> 
																@endif
																<a class="dropdown-item" data-toggle="modal" data-target="#update_{{ $v->id }}">Update</a>  
																<a class="dropdown-item confirm-delete" href="{{ URL::route('student.delete',$v->id) }}">Delete</a> 
															</div>
														</div>
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

	@include('pages.student.modals.import')
	@include('pages.student.modals.add')
	@if($data)
		@foreach($data as $key => $v)
			@include('pages.student.modals.update',['params' => $v])
		@endforeach
	@endif
@endsection 