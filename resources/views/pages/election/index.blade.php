@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				@if(!App\Models\Student::available())
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD STUDENTS FIRST !</h2>
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
										@if($data)
											@foreach($data as $key => $v)
												<tr>
													<td>{{ $v->id }}</td> 
													<td>{{ App\Models\Election::find($v->id)->sy() }}</td>   
													<td>{{ Carbon\Carbon::parse($v->voting_start,'Asia/Singapore')->diffForHumans() }}</td>   
													<td>{{ Carbon\Carbon::parse($v->voting_end,'Asia/Singapore')->diffForHumans() }}</td>   
													<td>
														@if(strtotime($v->voting_start) <= strtotime(Carbon\Carbon::now('Asia/Singapore')))
															@if(strtotime($v->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore')))	
																<span class="badge badge-success">STARTED</span>
															@else
																<span class="badge badge-warning">FINISHED</span>
															@endif
														@else
															<span class="badge badge-danger">PENDING</span> 
														@endif
													</td> 
													<td>
														@if(strtotime($v->voting_end) >= strtotime(Carbon\Carbon::now('Asia/Singapore')))	
															<div class="btn-group dropdown">
																<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																<div class="dropdown-menu" x-placement="bottom-start"> 
																	<a class="dropdown-item" data-toggle="modal" data-target="#update_{{ $v->id }}">Update</a>  
																	@if(Acl::disabled($title) == 'access')
																	<a class="dropdown-item confirm-delete" href="{{ URL::route('election.delete',$v->id) }}">Delete</a> 
																	@endif
																</div>
															</div>
														@endif
														<a class="btn btn-success" href="{{ URL::route('partylist',$v->id) }}">
															<span style="color: white;">Manage</span>
															<i class="la la-cog" style="color: white;"></i>
														</a> 
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
 
	@include('pages.election.modals.add')
	@if($data)
		@foreach($data as $key => $v)
			@include('pages.election.modals.update',['params' => $v])
		@endforeach
	@endif
@endsection 