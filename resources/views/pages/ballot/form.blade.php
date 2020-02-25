<div class="col-md-6">
	<div class="card">
		<h5 class="card-header">Your Voting form</h5>
		<form action="{{ URL::route('ballot.vote') }}" method="post">
			{{ csrf_field() }}
			<div class="card-body"> 
				@if($data)
					@foreach($data as $v)
						@if(count($v['data']) != 0)
							<p class="f-w-400 font-size-16  m-t-20"><b>{{ $v['position'] }}</b></p>
							<hr>
							@foreach($v['data'] as $can)
								<div class="form-checxk">
									<input type="radio" name="vote['{{ $v['position_id'] }}']" value="{{ $can['candidate_id'] }}">
									<label> 
										{{ strtoupper($can['details']['name']) }}
										<small>({{ App\Models\Partylist::find(App\Models\Candidate::find($can['candidate_id'])->partylist_id)->name }})</small>
									</label>
								</div> 
								<br>
							@endforeach
						@endif
					@endforeach
				@endif
			</div> 
			<hr>
			<div class="col-12">
				<button class="btn btn-success pull-right confirm-vote">
					SUBMIT VOTE
				</button>
				<a class="btn btn-primary pull-right" style="color: white; margin-right: 2%;" data-toggle="modal" data-target="#partylist">
					VOTE PARTYLIST
				</a>
			</div><br><br>
		</form>
	</div>
</div>
@include('pages.ballot.modals.partylist')
@section('extraJsx')
	<script type="text/javascript">
		$('body .confirm-vote').click(function(){ 
			if(!window.confirm("Are you sure you want to submit your vote ?")){
				return false;
			}
		});
	</script>
@endsection