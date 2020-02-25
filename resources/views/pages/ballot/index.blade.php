@extends('layouts.page.index') 
@section('context')
	<section class="page-content container-fluid">
		<div class="row">
			@if(Acl::status())   
				@if(Acl::isVoted()) 
					@if(Acl::isSchedule() == 'true')
						@include('pages.ballot.form') 
					@else
						<div class="col-12">
							<div class="card"> 
								<div class="card-body">
									<center>
										<br> 
										<p>YOUR VOTING SCHEDULE IS {{ Acl::isSchedule() }}</p>
									</center>
								</div>
							</div>
						</div>
					@endif
				@else 
					<div class="col-12">
						<div class="card"> 
							<div class="card-body">
								<center>
									<br> 
									<p>YOUR HAVE SUBMITTED YOUR VOTE !</p>
								</center>
							</div>
						</div>
					</div>
				@endif
			@elseif(Acl::comming() != false)
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h1 id="counter"> {{ date('M d, Y',strtotime(Acl::comming())) }}</h1>
								<p>BEFORE ELECTION STARTS</p>
							</center>
						</div>
					</div>
				</div>
			@else
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>NO UPCOMMING ELECTION !</h2>
							</center>
						</div>
					</div>
				</div>
			@endif 
		</div>
	</section> 
@endsection 