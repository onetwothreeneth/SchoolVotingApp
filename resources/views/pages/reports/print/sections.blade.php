<div class="container">
	<div class="header">
		<div class="a">
			<img src="{{ URL::asset('img/logo.webp') }}">
		</div>
		<div class="b">
			<h5>SERGIO OSMENA SENIOR HIGHSCHOOL</h5> 
			<small>QUEZON CITY</small> 
			<p>SUPREME STUDENT GOVERNMENT</p>
			<small>
				<b>
					Election Tally (per section)		
				</b>
			</small>
		</div>
		<div class="c">
			<img src="{{ URL::asset('img/qc.jpg') }}">
		</div>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<td>POSITION</td>
					<td>NAME OF CANDIDATE</td>
					@foreach($sections as $v)
						<td style="background: red;">{{ $v->name }}</td> 
					@endforeach
					<td>NUMBER OF VOTES</td> 
				</tr>
			</thead>
			<tbody>
				@if($data)
					@foreach($data as $v)
						<tr>
							<td style="text-align: left;"><b>{{ $v['position'] }}</b></td>
							<td></td>
							@foreach($sections as $lvl)
								<td></td> 
							@endforeach
							<td></td>
						</tr>
						@if($v['data'])
							<?php $highlight = true; ?>
							@foreach($v['data'] as $cans)
								<tr @if($highlight) style="background-color: lightblue;" @endif>
									<td>{{ strtoupper(App\Models\Partylist::find($cans['partylist'])->name) }}</td> 
									<td>{{ strtoupper(App\Models\Student::find($cans['student_id'])->fname.' '.App\Models\Student::find($cans['student_id'])->mname.' '.App\Models\Student::find($cans['student_id'])->lname) }}</td> 
									<?php $total = 0; ?>
									@foreach($cans['section'] as $lvlx)
										<td>{{ $lvlx }}</td> 
										<?php $total = $total + $lvlx; ?>
									@endforeach
									<td>{{ $total }}</td>
								</tr> 
								<?php $highlight = false; ?>
							@endforeach
						@else 
							<tr>
								<td>No entry</td>
								<td></td>
								@foreach($sections as $lvl)
									<td></td> 
								@endforeach
								<td></td>
							</tr>
						@endif
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
	@include('pages.reports.print.signatories')
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