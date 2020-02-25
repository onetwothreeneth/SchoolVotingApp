<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('level.add') }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Level</label>
						<select class="form-control" name="level"> 
							<option>7</option> 	
							<option>8</option> 	
							<option>9</option> 	
							<option>10</option>  
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Schedule</label> 
						<select class="form-control" name="schedule_id"> 
							@foreach($schedule as $v)
								<option value="{{ $v->id }}">{{ date('h:i A',strtotime($v->sched_start)) }} - {{ date('h:i A',strtotime($v->sched_end)) }}</option>  	
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