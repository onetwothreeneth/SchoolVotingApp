<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('section.update',$params->id) }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">Section</label>
						<input type="text" class="form-control" name="section" required value="{{ $params->name }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Grade Level</label> 
						<select class="form-control" name="level"> 
							@foreach($level as $v)
								<option @if($v->id == $params->gradelevel_id) selected @endif value="{{ $v->id }}">{{ $v->level }}</option>  	
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