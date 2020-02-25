<div class="modal fade" id="partylist" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Vote Partylist</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('ballot.vote') }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Choose Partylist</label>
						<select class="form-control" name="partylist">
							@foreach($partylist as $v)
								<option value="{{ $v->id }}">{{ $v->name }}</option>
							@endforeach
						</select>
						<p><small>
							THIS WILL AUTOMATICALLY VOTE CANDIDATES UNDER THIS PARTYLIST
						</small></p>
					</div> 
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary btn-outline" data-dismiss="modal">Close</a>
					<button class="btn btn-primary confirm-vote">Vote</button>
				</div>
			</form>
		</div>
	</div>
</div>