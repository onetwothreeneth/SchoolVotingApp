<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('election.update',$params->id) }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">School Year</label> 
						<select class="form-control" name="sy"> 
							@foreach($sy as $v)
								<option @if($v->id == $params->schoolyear) selected @endif value="{{ $v->id }}">{{ $v->sy_start }} - {{ $v->sy_end }}</option>  	
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Voting Start</label>
						<input type="date" class="form-control" name="voting_start" required value="{{ $params->voting_start }}" min="{{ date('Y-m-d',strtotime(Carbon\Carbon::now('Asia/Singapore'))) }}">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Voting End</label>
						<input type="date" class="form-control" name="voting_end" required value="{{ $params->voting_end }}" min="{{ date('Y-m-d',strtotime(Carbon\Carbon::now('Asia/Singapore'))) }}">
					</div>    
				</div>
				<div class="modal-footer">
					<a class="btn btn-secondary btn-outline" data-dismiss="modal">Close</a>
					<button class="btn btn-primary confirm-save">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>