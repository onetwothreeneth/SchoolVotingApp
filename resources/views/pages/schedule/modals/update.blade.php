<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('schedule.update',$params->id) }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Type</label>
						<select class="form-control" name="type"> 
							<option @if($params->type == 'AM') selected @endif>AM</option> 	
							<option @if($params->type == 'PM') selected @endif>PM</option> 	
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Start</label>  
						<input type="time" class="form-control" name="sched_end" required value="{{ $params->sched_start }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">End</label> 
						<input type="time" class="form-control" name="sched_end" required value="{{ $params->sched_end }}">
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