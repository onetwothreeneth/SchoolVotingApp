<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('level.update',$params->id) }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Level</label>
						<select class="form-control" name="level"> 
							<option @if($params->level == '7') selected @endif>7</option> 	
							<option @if($params->level == '8') selected @endif>8</option> 	
							<option @if($params->level == '9') selected @endif>9</option> 	
							<option @if($params->level == '10') selected @endif>10</option>  
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Schedule</label> 
						<select class="form-control" name="schedule_id"> 
							@foreach($schedule as $v)
								<option @if($params->schedule_id == $v->id) selected @endif value="{{ $v->id }}">
									{{ $v->sched_start }} - {{ $v->sched_end }} {{ $v->type}}
								</option>  	
							@endforeach
						</select>
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