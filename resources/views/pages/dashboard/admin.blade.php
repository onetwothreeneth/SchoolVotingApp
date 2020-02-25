@extends('layouts.page.index') 
@section('context')
	<section class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="row m-0 col-border-xl">
						<div class="col-md-12 col-lg-6 col-xl-3">
							<div class="card-body">
								<div class="icon-rounded icon-rounded-primary float-left m-r-20">
									<i class="icon dripicons-graph-bar"></i>
								</div>
								<h5 class="card-title m-b-5 counter" data-count="5627">5,627</h5>
								<h6 class="text-muted m-t-10">
									Active Agents
								</h6>
								<div class="progress progress-active-sessions mt-4" style="height:7px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<small class="text-muted float-left m-t-5 mb-3">
									Products
								</small>
								<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="72">72</small>
							</div>
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">
							<div class="card-body">
								<div class="icon-rounded icon-rounded-accent float-left m-r-20">
									<i class="icon dripicons-cart"></i>
								</div>
								<h5 class="card-title m-b-5 append-percent counter" data-count="67">67</h5>
								<h6 class="text-muted m-t-10">
									Sold
								</h6>
								<div class="progress progress-add-to-cart mt-4" style="height:7px;">
									<div class="progress-bar bg-accent" role="progressbar" style="width: 67%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<small class="text-muted float-left m-t-5 mb-3">
									Change
								</small>
								<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="67">67</small>
							</div>
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">
							<div class="card-body">
								<div class="icon-rounded icon-rounded-info float-left m-r-20">
									<i class="icon dripicons-mail"></i>
								</div>
								<h5 class="card-title m-b-5 counter" data-count="337">337</h5>
								<h6 class="text-muted m-t-10">
									Revenue
								</h6>
								<div class="progress progress-new-account mt-4" style="height:7px;">
									<div class="progress-bar bg-info" role="progressbar" style="width: 83%;" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<small class="text-muted float-left m-t-5 mb-3">
									Change
								</small>
								<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="83">83</small>
							</div>
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">
							<div class="card-body">
								<div class="icon-rounded icon-rounded-success float-left m-r-20">
									<i class="la la-dollar f-w-600"></i>
								</div>
								<h5 class="card-title m-b-5 prepend-currency counter" data-count="37873">37,873</h5>
								<h6 class="text-muted m-t-10">
									Total Revenue
								</h6>
								<div class="progress progress-total-revenue mt-4" style="height:7px;">
									<div class="progress-bar bg-success" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<small class="text-muted float-left m-t-5 mb-3">
									Change
								</small>
								<small class="text-muted float-right m-t-5 mb-3 counter append-percent" data-count="77">77</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-7 col-xxl-8">
				<div class="card">
					<h5 class="card-header">
						Monthly Transactions
					</h5>
					<div class="card-body">
						<div id="chart">
							<div id="chart-content" style="height: 375px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-5 col-xxl-4">
				<div class="card">
					<div class="card-header">Audit Log
						<div class="actions top-right">
							<div class="dropdown">
								<a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="la la-ellipsis-h"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right animation">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="timeline timeline-border">
							<div class="timeline-list">
								<div class="timeline-info">
									<div class="d-inline-block">Server pending</div>
									<small class="float-right text-muted">Now</small>
								</div>
							</div>
							<div class="timeline-list">
								<div class="timeline-info">
									<div class="d-inline-block">Server pending</div>
									<small class="float-right text-muted">Now</small>
								</div>
							</div>
							<div class="timeline-list timeline-border timeline-primary">
								<div class="timeline-info">
									<div class="d-inline-block">Delivery complete</div>
									<small class="float-right text-muted">10min.</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-accent">
								<div class="timeline-info">
									<div class="d-inline-block">Delivery processing</div>
									<small class="float-right text-muted">1hr.</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-success">
								<div class="timeline-info">
									<div class="d-inline-block">Payment recorded</div>
									<small class="float-right text-muted">11:22am</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-warning">
								<div class="timeline-info">
									<div class="d-inline-block">Order complete</div>
									<small class="float-right text-muted">9:30AM</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-info">
								<div class="timeline-info">
									<div class="d-inline-block">Product quantities updated</div>
									<small class="float-right text-muted">9:27am</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-info">
								<div class="timeline-info">
									<div class="d-inline-block">Ticket #627 Closed</div>
									<small class="float-right text-muted">8:02am</small>
								</div>
							</div>
							<div class="timeline-list  timeline-border timeline-info">
								<div class="timeline-info">
									<div class="d-inline-block">Cache cleared</div>
									<small class="float-right text-muted">6:00am</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection  
@section('extraJs')
	@include('layouts.components.charts.index')
	<script type="text/javascript">
		(function(window, document, $, undefined) {
			  "use strict";
			$(function() {
				var data7_1 = [
					[0, 4],
					[1, 8],
					[2, 5],
					[3, 10],
					[4, 4],
					[5, 16],
					[6, 5],
					[7, 11],
					[8, 6],
					[9, 11],
					[10, 30],
					[11, 10],
					[12, 13],
					[13, 4],
					[14, 3],
					[15, 3],
					[16, 6]
				];
				var data7_2 = [
					[0, 1],
					[1, 0],
					[2, 2],
					[3, 0],
					[4, 1],
					[5, 3],
					[6, 1],
					[7, 5],
					[8, 2],
					[9, 3],
					[10, 2],
					[11, 1],
					[12, 0],
					[13, 2],
					[14, 8],
					[15, 0],
					[16, 0]
				];

				$.plot($("#chart #chart-content"), [{
					data: data7_1,
					label: "Expenses",
					points: {
						show: false
					},
					curvedLines: {
						apply: true
					},
					lines: {
						fill: true
					}
				}, {
					data: data7_2,
					label: "Income",
					points: {
						show: false
					},
					lines: {
						show: true
					},
					yaxis: 2
				}], {
					series: {
						lines: {
							show: true,
							fill: true
						},
						curvedLines: {
							apply: true,
							monotonicFit: true,
							active: true
						},
						points: {
							show: true,
							lineWidth: 2,
							fill: true,
							fillColor: "#ffffff",
							symbol: "circle",
							radius: 5
						},
						shadowSize: 0
					},
					grid: {
						hoverable: true,
						clickable: true,
						tickColor: "#e5ebf8",
						borderWidth: 1,
						borderColor: "#e5ebf8"
					},
					colors: [QuantumPro.APP_COLORS.accent, QuantumPro.APP_COLORS.primary],
					tooltip: true,
					tooltipOpts: {
						defaultTheme: false
					},
					xaxis: {
						ticks: [
							[1, "Jan"],
							[2, "Feb"],
							[3, "Mar"],
							[4, "Apr"],
							[5, "May"],
							[6, "Jun"],
							[7, "Jul"],
							[8, "Aug"],
							[9, "Sep"],
							[10, "Oct"],
							[11, "Nov"],
							[12, "Dec"]
						]
					},
					yaxes: [{}, {
						position: "right" /* left or right */
					}]
				});
			});
		})(window, document, window.jQuery);
	</script>
@endsection