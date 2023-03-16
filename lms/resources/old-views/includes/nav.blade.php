	<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li class="">
											<a href="{{ route('frontend.index') }}">{{  __('frontend.Home')  }}</a>

										</li>

										<li class="">
											<a href="{{ route('frontend.all') }}">{{  __('frontend.All_Ads')  }}</a>
										</li>





												@foreach(\App\Models\Page\Page::where('sub','0')->get()  as  $page)
											<li class=""><a href="{{url('pages/'.$page->page_slug) }} ">


													@if(session('locale')=="fr")
														{{ $page->title_fr }}
													@else
														{{ $page->title }}
													@endif
												</a>
											</li>
												@endforeach

										<li class="">
											<a href="{{ url('faq') }}">{{  __('frontend.FAQ')  }}</a>
										</li>

										<li class="">
											<a href="{{ url('contact') }}">{{  __('frontend.Contact_Us')  }}</a>
										</li>


									</ul>
								</div>
							</nav>

