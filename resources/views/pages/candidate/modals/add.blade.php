<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add {{ $breadcrumbs['title'] }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('candidate.add',[$party]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label class="control-label">Student <small>(search by LRN)</small></label> 
						<select class="form-control col-12" id="s2_demo1" name="student">
							@foreach($student as $v)
								@if(!in_array($v->id,$candidates))
									<option value="{{ $v->id }}">
										{{ $v->lrn }} -
										{{ strtoupper($v->fname) }} 
										{{ strtoupper($v->mname) }} 
										{{ strtoupper($v->lname) }}
										(Grade {{ App\Models\Level::find(App\Models\Section::find($v->section_id)['gradelevel_id'])['level'] }})
									</option>
								@endif
							@endforeach
						</select> 
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Position</label>
						<select class="form-control" name="position">
							@foreach($position as $v)
								@if(!in_array($v->id,$positions))
									<option value="{{ $v->id }}">{{ $v->name }}</option>
								@endif
							@endforeach
						</select>
					</div>  
					<div class="form-group">
						<label for="demoTextInput1">Intro</label>
						<textarea class="form-control" name="intro" required rows="5"></textarea>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">G.P.A</label>
						<input type="text" class="form-control" name="gpa" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">COC</label>
						<input type="file" class="form-control" name="file_coc" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Form 137</label>
						<input type="file" class="form-control" name="file_grade" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Good moral</label>
						<input type="file" class="form-control" name="file_goodmoral" required>
					</div>   
					<div class="form-group">
						<label for="demoTextInput1">Parents Consent</label>
						<input type="file" class="form-control" name="file_consent" required>
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