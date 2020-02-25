@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				@if(!App\Models\Sy::available())
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>PLEASE ADD A SCHOOL YEAR FIRST !</h2>
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
											<th>Type</th> 
											<th>Schedule</th>
											<th>Status</th>
											<th>Updated at</th>  
											<th>Created at</th>  
											<th></th>  
										</tr>
									</thead>
									<tbody>
										@if($data)
											@foreach($data as $key => $v)
												<tr>
													<td>{{ $v->id }}</td> 
													<td>{{ $v->type }}</td> 
													<td>
														{{ date('h:i A',strtotime($v->sched_start)) }} - {{ date('h:i A',strtotime($v->sched_end)) }}
													</td>
													<td>
														<span class="badge badge-success">Active</span>
													</td>
													<td>{{ $v->updated_at->diffForHumans() }}</td>
													<td>{{ $v->created_at->diffForHumans() }}</td> 
													<td>
														<div class="btn-group dropdown">
															<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" {{ Acl::disabled($title) }}>Action</button>
															<div class="dropdown-menu" x-placement="bottom-start"> 
																<a class="dropdown-item" data-toggle="modal" data-target="#update_{{ $v->id }}">Update</a>  
																<a class="dropdown-item confirm-delete" href="{{ URL::route('schedule.delete',$v->id) }}">Delete</a> 
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
					</div>
				@endif
			</div>
		</div>
	</div>

	@include('pages.schedule.modals.add')
	@if($data)
		@foreach($data as $key => $v)
			@include('pages.schedule.modals.update',['params' => $v])
		@endforeach
	@endif
@endsection 