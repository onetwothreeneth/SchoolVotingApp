@extends('layouts.main.index') 
@section('content')
	<div class="container">
		<form class="sign-in-form" method="post" action="{{ URL::route('admin.login.verify') }}" style="margin-top: 100px;">
			<div class="card">
				<div class="card-body">
					<a class="brand text-center d-block m-b-20">
						<img src="{{ URL::asset('img/logo.webp') }}" alt="Segio Logo" width="30%" />
					</a>
					<h5 class="sign-in-heading text-center m-b-20">Sign in as administrator</h5>

					@include('errors.forms.index')

					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputEmail" class="sr-only">Username</label>
						<input type="text" id="inputEmail" class="form-control" placeholder="Username" required name="username" value="{{ old('username') }}">
					</div>

					<div class="form-group">
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" value="{{ old('password') }}">
					</div>
					<div class="checkbox m-b-10 m-t-20">
						<div class="custom-control custom-checkbox checkbox-primary form-check">
							<input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
							<label class="custom-control-label" for="stateCheck1">	Remember me</label>
						</div> 
					</div>
					<button class="aa-bg btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
				 	<p class="text-muted m-t-25 m-b-0 p-0">
				 		<center> 
				 			Segio Voting &copy {{ date('Y') }}		
				 		</center>
				 	</p>
				</div>

			</div>
		</form>
	</div>
@endsection