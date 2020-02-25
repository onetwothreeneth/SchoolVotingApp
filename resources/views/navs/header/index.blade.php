<li class="nav-item dropdown">
	<a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		@if(!is_null(Auth::user()->img))
			<img src="{{ URL::asset('uploads/profile/'.Auth::user()->img) }}" class="w-35 rounded-circle">
		@else
			<img src="{{ URL::asset('img/default.png') }}" class="w-35 rounded-circle">
		@endif
	</a>
	<div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
		<div class="dropdown-header pb-3">
			<div class="media d-user">
				@if(!is_null(Auth::user()->img))
					<img class="align-self-center mr-3 w-40 rounded-circle" src="{{ URL::asset('uploads/profile/'.Auth::user()->img) }}">
				@else
					<img class="align-self-center mr-3 w-40 rounded-circle" src="{{ URL::asset('img/default.png') }}">
				@endif
				<div class="media-body">
					<h5 class="mt-0 mb-0">{{ ucfirst(Auth::user()->name) }}</h5>
					<span>
						{{ ucfirst(Auth::user()->type) }}
					</span>
				</div>
			</div>
		</div>  
		<div class="dropdown-divider"></div> 
		<a class="dropdown-item" href="{{ URL::route('logout') }}"><i class="icon dripicons-lock-open"></i> Sign Out</a>
	</div>
</li>  