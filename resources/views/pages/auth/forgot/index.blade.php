@extends('layouts.main.index') 
@section('content')
	<div class="container">
		<form class="sign-in-form" method="post" action="{{ URL::route('forgot.verify') }}" style="margin-top: 100px;">
			<div class="card">
				<div class="card-body">
					<a class="brand text-center d-block m-b-20">
						<img src="{{ URL::asset('img/logo.webp') }}" alt="Segio Logo" width="30%" />
					</a>
					<h5 class="sign-in-heading text-center m-b-20">Forgot Password</h5>

					@include('errors.forms.index')

					{{ csrf_field() }}
					<div class="form-group">
						<label for="inputEmail" class="sr-only">LRN</label>
						<input type="text" id="inputEmail" class="form-control" placeholder="LRN" required name="username" value="{{ old('username') }}">
					</div> 
					<button class="aa-bg btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Check</button>
				 	<p class="text-muted m-t-25 m-b-0 p-0">
				 		<center> 
							<a href="{{ URL::route('login') }}">Back to login</a>
							<br>
				 			Segio Voting &copy {{ date('Y') }}		
				 		</center>
				 	</p>
				</div>

			</div>
		</form>
	</div>
@endsection