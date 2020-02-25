<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true" data-modal="scroll">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalFixedHeightTitle">Add {{ $title }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-close"></span>
				</button>
			</div>
			<form action="{{ URL::route('sy.add') }}" method="post">
				{{ csrf_field() }}
				<div class="modal-body"> 
					<div class="form-group">
						<label for="demoTextInput1">SY</label>
						<select class="form-control" name="sy">
							@for($i=0; $i <= 4; $i++)
								<option>
									@if($i == 0)
										{{ date('Y',strtotime(date('Y-m-d'))) }} -
									@else 
										{{ date('Y',strtotime(date('Y-m-d').' +'.$i.' years')) }} -
									@endif
									{{ date('Y',strtotime(date('Y-m-d').' +'.($i+1).' years')) }} 
								</option>
							@endfor
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