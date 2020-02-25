<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('student.update',$params->id) }}" method="post">
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
						<label for="demoTextInput1">Section</label> 
						<select class="form-control" name="section"> 
							@foreach($section as $v)
								<option @if($v->id == $params->section_id) selected @endif value="{{ $v->id }}">{{ $v->name }}</option>  	
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">LRN</label>
						<input type="number" disabled class="form-control" name="lrn" required value="{{ $params->lrn }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Email</label>
						<input type="email" class="form-control" name="email" required value="{{ $params->email }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">First Name</label>
						<input type="text" class="form-control" name="fname" required value="{{ $params->fname }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Middle Name</label>
						<input type="text" class="form-control" name="mname" required value="{{ $params->mname }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Last Name</label>
						<input type="text" class="form-control" name="lname" required value="{{ $params->lname }}">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Gender</label> 
						<select class="form-control" name="gender">  
							<option @if($params == 'M') selected @endif value="M">M</option>  	
							<option @if($params == 'F') selected @endif value="F">F</option>  	
						</select>
					</div> 
					<div class="form-group">
						<label for="demoTextInput1">Address</label>
						<textarea rows="4" class="form-control" name="address" required>{{ $params->address }}</textarea>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Parent name</label>
						<input type="text" class="form-control" name="parent" required value="{{ $params->parent }}">
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Birthday (this will be the default password, will not be overwrited when leaved blank)</label>
						<input type="date" class="form-control" name="birthday">
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