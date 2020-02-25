@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ URL::route('history.generate') }}" method="post" target="_blank">
							{{ csrf_field() }} 
							<h4>Choose school year</h4>
							<hr>
							<div class="col-12">
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">School Year</label> 
									<select class="form-control" name="sy"> 
										@foreach($data as $v)
											<option value="{{ $v->id }}">{{ $v->sy_start }} - {{ $v->sy_end }}</option>  	
										@endforeach
									</select>
								</div>  
								<div class="form-group radio col-12 col-xl-4"> 
									<input type="radio" name="type" value="Election Result" required>
									<label>Election Result</label> 
								</div>
								<div class="form-group radio col-12 col-xl-4"> 
									<input type="radio" name="type" value="Ballot" required>
									<label>Ballot</label> 
								</div>
								<div class="form-group col-12 col-xl-4">
									<button class="btn btn-primary">
										<i class="la la-eye" style="color:white"></i>
										View History
									</button>
								</div>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> 
@endsection 
@section('extraCss')
	<style type="text/css">
		.radio { 
			width: 100%;
		}
	</style>
@endsection