<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Import {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('student.import') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">File <small>(CSV TEMPLATE FORMAT)</small></label>
						<input type="file" class="form-control" name="file" required>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">School Year</label> 
						<select class="form-control" name="sy">  
							@foreach($sy as $v)
								<option value="{{ $v->id }}">{{ $v->sy_start }} - {{ $v->sy_end }}</option>  	
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