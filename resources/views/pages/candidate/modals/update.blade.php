<div class="modal fade" id="update_{{ $params->id }}" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Update {{ $breadcrumbs['title'] }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('candidate.update',[$party,$params->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label class="control-label">Student <small>(This should not be change delete to add different candidate)</small></label> 
						<select class="form-control col-12" id="s2_demo1" name="student" disabled>
							@foreach($student as $v)
								<option value="{{ $v->id }}" @if($v->id == $params->id) selected @endif>
									{{ $v->lrn }} -
									{{ strtoupper($v->fname) }} 
									{{ strtoupper($v->mname) }} 
									{{ strtoupper($v->lname) }}
								</option>
							@endforeach
						</select> 
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Position <small>(This should not be change delete to add different candidate)</small></label>
						<select class="form-control" name="position" disabled>
							@foreach($position as $v)
								<option value="{{ $v->id }}" @if($v->id == $params->id) selected @endif>{{ $v->name }}</option>
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Intro</label>
						<textarea class="form-control" name="intro" required rows="5">{{ $params->intro }}</textarea>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">G.P.A</label>
						<input type="text" class="form-control" name="gpa" required value="{{ $params->gpa }}">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">COC</label>
						<input type="file" class="form-control" name="file_coc">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Form 137</label>
						<input type="file" class="form-control" name="file_grade">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Good moral</label>
						<input type="file" class="form-control" name="file_goodmoral">
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Parents Consent</label>
						<input type="file" class="form-control" name="file_consent">
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