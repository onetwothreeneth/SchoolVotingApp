@extends('layouts.page.index') 
@section('context')
	<section class="page-content container-fluid">
		<div class="row">
			@if(Acl::status())
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h2>ELECTION HAS BEEN STARTED @if(Auth::user()->type == 'student') YOU MAY NOW SUBMIT YOUR VOTES @endif !</h2>
							</center>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-xl-12">
					<h3>Live Tally</h3><br>
				</div>
				@if($tally)
					@foreach($tally as $v)
						@if(count($v['data']) != 0)
							<div class="col-lg-12 col-xl-3"> 
								<div class="card">
									<div class="card-header">
										<span class="m-t-10 d-inline-block"><b>{{ $v['position'] }}</b></span> 
									</div>
									<div class="card-body p-0">
										<div class="tab-content" id="pills-tabContent-sales">
											<div class="tab-pane fade show active" id="sales-month-tab" role="tabpanel" aria-labelledby="sales-month-tab">
												<table class="table v-align-middle">
													<thead class="bg-light">
														<tr>
															<th class="p-l-20">Name</th>
															<th>Votes</th> 
														</tr>
													</thead>
													<tbody>
														@if($v['data'])
															<?php arsort($v['data']); ?>
															@foreach($v['data'] as $can)
																<tr>
																	<td>
																		<img class="align-self-center mr-3 ml-2 w-50 rounded-circle" src="{{ URL::asset('uploads/profile/'.$can['details']['img']) }}" alt="">
																		<strong class="nowrap">{{ strtoupper($can['details']['name']) }}</strong>
																	</td>
																	<td>{{ $can['votes'] }}</td> 
																</tr> 
															@endforeach
														@endif
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endif
					@endforeach
				@endif
			@elseif(Acl::comming() != false)
				<div class="col-12">
					<div class="card"> 
						<div class="card-body">
							<center>
								<br>
								<h1 id="counter"> {{ date('M d, Y',strtotime(Acl::comming())) }}</h1>
								<p id="message">BEFORE ELECTION STARTS</p> 
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
@section('extraJsx')
	<script> 
		date = "<?php echo date('M d, Y 01:00:00',strtotime(Acl::comming())) ?>"; 
		var countDownDate = new Date(date).getTime(); 
 
		var x = setInterval(function() {
 
		  var now = new Date().getTime(); 
		  var distance = countDownDate - now;
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
		  document.getElementById("counter").innerHTML = days + " <small>DAYS</small> " + hours + " <small>HOURS</small> "
		  + minutes + " <small>MINUTES</small> " + seconds + " <small>SECONDS</small> ";
 
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("counter").innerHTML = "EXPIRED";
		    document.getElementById("message").innerHTML = "ELECTION IS NOW OFFICIALLY CLOSED ";
		  }
		}, 1000);
	</script>
@endsection