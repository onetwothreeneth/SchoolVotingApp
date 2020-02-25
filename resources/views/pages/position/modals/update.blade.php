<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('position.update',$params->id) }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Position</label>
						<input type="text" class="form-control" name="name" required value="{{ $params->name }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Eligibility</label> 
						<select class="form-control" name="eligibility"> 
							<option @if($params->eligibility == 'all') selected @endif value="all">All *</option>
							@foreach($level as $v)
								<option @if($params->eligibility == $v->id) selected @endif value="{{ $v->id }}">{{ $v->level }}</option>  	
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