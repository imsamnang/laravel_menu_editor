<ul>
	@foreach ($menus as $menu)
		<li><a href="{{$menu['href']}}">{{$menu['text']}}</a>
			@if (@$menu['children'])
				<ul>
					@foreach ($menu['children'] as $sub)
						<li><a href="{{$sub['href']}}">{{$sub['text']}}</a>
							@if (@$sub['children'])
								<ul>
									@foreach ($sub['children'] as $nes)
										<li><a href="{{$nes['href']}}">{{$nes['text']}}</a></li>
									@endforeach
								</ul>
							@endif
						</li>
					@endforeach
				</ul>
			@endif
		</li>
	@endforeach
</ul>