@extends('layouts.page.index') 
@section('context')
	<div class="page-content container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ URL::route('password.change') }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}  
							<h4>Account Settings</h4>
							<hr>
							<div class="col-12"> 
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">Change Profile Photo</label> 
									<input type="file" class="form-control" name="profile"> 
								</div>   
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">Old password</label> 
									<input type="password" class="form-control" name="old"> 
								</div>   
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">New Password</label> 
									<input type="password" class="form-control" name="new"> 
								</div>   
								<div class="form-group col-12 col-xl-4">
									<label for="demoTextInput1">Confirm New Password</label> 
									<input type="password" class="form-control" name="confirm"> 
								</div>   
								<div class="form-group col-12 col-xl-4">
									<button class="btn btn-primary"> 
										Save
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