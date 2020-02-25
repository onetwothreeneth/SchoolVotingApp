@if(isset($sidebar))
	<nav class="main-menu">
		<ul class="nav metismenu">
			<li class="sidebar-header"><span>NAVIGATION</span></li> 
			@foreach($sidebar as $key => $value)
				@if(isset($value['sub']) && $value['sub'] == true)
					<li class="nav-dropdown @if(@$active && @$active === $value['title']) active @endif">
						<a class="has-arrow" href="#" aria-expanded="false"><i class="{{ $value['icon'] }}"></i><span>{{ $value['title'] }}</span></a>
						<ul class="collapse nav-sub" aria-expanded="false">
							@foreach($value['data'] as $k => $v)
								<li>
									<a href="{{ URL::route($v['url']) }}">
										<span>{{ $v['title'] }}</span>
													
										@if(Auth::user()->type == 'admin')
											@if(Acl::status())
												@if(in_array($v['title'],Acl::locked()))
													<span class="pull-right"><i class="la la-lock"></i></span>
												@endif
											@endif
										@endif
									</a>
								</li> 
							@endforeach
						</ul>
					</li>  
				@else
					<li class="@if(@$active == $value['title']) active @endif">
						<a href="{{ URL::route($value['url']) }}">
							<i class="{{ $value['icon'] }}"></i>
							<span>{{ $value['title'] }}</span>
							
							@if(Auth::user()->type == 'admin')
								@if(Acl::status())
									@if(in_array($value['title'],Acl::locked()))
										<span class="pull-right"><i class="la la-lock"></i></span>
									@endif
								@endif
							@endif
						</a>
					</li>  
				@endif 
			@endforeach
		</ul>
	</nav> 
@endif