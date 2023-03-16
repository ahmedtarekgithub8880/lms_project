


<header class="header menu_2">
    <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
    <div id="logo">
        <a href="{{ url('/') }}"><img src="{{URL::asset('img\logo.png')}}" width="90" height="42" data-retina="true" alt=""></a>
    </div>
    <ul id="top_menu">


        @auth

            <?php
            $user_id= auth()->user()->id;

            $user= \App\User::where('id',$user_id)->get();
            ?>

            <li class="hidden_tablet"><a href="{{ route('my_dashboard') }}" class="btn_1 rounded">  My Dashboard </a></li>
        @endauth

        @guest
                <li class="hidden_tablet"><a href="{{ route('login') }}" class="btn_1 rounded">Login</a></li>
        @endguest





    </ul >
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            <li><span><a href="{{route('index')}}">Home</a></span>

            </li>


            @foreach(\TCG\Voyager\Models\Page::where('sub_of','0')->where('status','ACTIVE')->get()  as  $page)

@if((\TCG\Voyager\Models\Page::where('sub_of',$page->id)->where('status','ACTIVE')->get())->isEmpty())
<li><span><a href="{{url('pages/'.$page->slug) }} ">

    {{ $page->title }}

    </span></a>
</li>

@else
  <li><span><a href="{{url('pages/'.$page->slug) }}">{{ $page->title }}</span></a>
  <ul>
          @foreach(\TCG\Voyager\Models\Page::where('sub_of',$page->id)->where('status','ACTIVE')->get()  as  $sub_page)

              <li><span><a href="{{url('pages/'.$sub_page->slug)}}">{{$sub_page->title}}</span></a></li>



          @endforeach
          </ul>

  </li>


@endif
@endforeach

                                            <li><span><a href="{{route('cources')}}">Courses</span></a>
								                <ul >
                                                @foreach(\TCG\Voyager\Models\Category::all()  as  $cat)

                                                    <li><span><a href="#">{{ $cat->name }}</span></a>
                                                    <ul class="second_sub">
                                                            @foreach(\App\Course::where('category_id', $cat->id )->get()  as  $course)
                                                                <li><span><a href="{{route('course_details',$course->slug)}}">{{$course->title}}</span></a></li>
                                                            @endforeach
                                                        </ul>

                                                    </li>
                                                @endforeach
								                </ul>
							                </li>

                                            <li><span><a href="{{route('news')}}">

														News

                                                        <span></a>
											</li>






         </ul>
    </nav>
    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search...">
            <button type="submit"><i class="icon_search"></i>
            </button>
        </form>
    </div><!-- End Search Menu -->
</header>





{{--<header id="ed_header_wrapper">--}}
{{--    <div class="ed_header_top">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                    <p>welcome to our new session of education</p>--}}

{{--<!-- login -->--}}
{{--                    @if(!isset(auth()->user()->id))--}}
{{--                    <div class="ed_info_wrapper">--}}
{{--                        <a  id="login_button">Login</a>--}}
{{--                        <div id="login_one" class="ed_login_form">--}}
{{--                            <h3>log in</h3>--}}
{{--                            <form class="form" method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group">--}}
{{--                            <label for="email" class="control-label col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
{{--                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                            @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}

{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="password" class="control-label col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}

{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                                    <a href="register">registration</a>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                            <div class="social-login-icons" style="float: left ;  margin-right: 80px ; text-align: left">--}}
{{--                                <a style="background-color: white ; color:#167ac6; " href="{{ url('login/facebook') }}"> <img class="social-icons-register" src="{{ URL::asset('images/facebook.png') }}"> Login with Facebook  </a>--}}
{{--                                <a style="background-color: white ; color:#167ac6; " href="{{ url('login/google') }}" >  <img class="social-icons-register" src="{{ URL::asset('images/google.png') }}">  Login with Google  </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                      @else--}}

{{--                        <div class="ed_info_wrapper">--}}
{{--                           <?php--}}
{{--                            $user_id= auth()->user()->id;--}}

{{--                            $user= \App\User::where('id',$user_id)->get();--}}
{{--                           ?>--}}
{{--                            <a   style="padding: 7px 19px;"  id="login_button">    <img  style="    width: 6%;border-radius: 20px; margin-bottom: 3px;    margin-right: 10px;" src="{{ isset($user[0]->provider_id) ? $user[0]->avatar : Storage::disk('public')->url($user[0]->avatar) }}" >  {{ $user[0]->name }}  </a>--}}

{{--                               <div id="login_one" class="ed_login_form" style="width: 32.5%;top: 92%;">--}}
{{--                                   <h3>  <a href="{{route('my_dashboard')}}" style="background: none; color: #3c3d49;font-family: 'Open Sans', sans-serif; font-size: 14px;">My Profile </a> </h3>--}}
{{--                                   <h3>--}}

{{--                                       <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background: none; color: #3c3d49;font-family: 'Open Sans', sans-serif; font-size: 14px;">--}}
{{--                                           Logout</a>--}}

{{--                                           <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
{{--                                               {{ csrf_field() }}--}}
{{--                                           </form>--}}


{{--                                   </h3>--}}
{{--                               </div>--}}


{{--                        </div>--}}





{{--                @endif--}}

{{--<!-- end -->--}}



{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="ed_header_bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-2 col-md-2 col-sm-2">--}}
{{--                    <div class="educo_logo"> <a href="index.html"><img src="images/header/Logo.png" alt="logo" /></a> </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-8 col-md-8 col-sm-8">--}}
{{--                    <div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>--}}
{{--                    </div>--}}
{{--                    <div class="edoco_menu">--}}
{{--                        <ul class="collapse navbar-collapse" id="ed_menu">--}}



{{--                                    <li><a href="{{route('index')}}">--}}

{{--                                                      Home--}}

{{--                                              </a>--}}
{{--                                          </li>--}}


{{-- 												@foreach(\TCG\Voyager\Models\Page::where('sub_of','0')->where('status','ACTIVE')->get()  as  $page)--}}

{{--                                                  @if((\TCG\Voyager\Models\Page::where('sub_of',$page->id)->where('status','ACTIVE')->get())->isEmpty())--}}
{{--                                                  <li><a href="{{url('pages/'.$page->slug) }} ">--}}

{{--                                                      {{ $page->title }}--}}

{{--                                              </a>--}}
{{--                                          </li>--}}

{{--                                                @else--}}
{{--                                                    <li><a href="{{url('pages/'.$page->slug) }}">{{ $page->title }}</a>--}}
{{--								                        <ul class="sub-menu">--}}
{{--                                                            @foreach(\TCG\Voyager\Models\Page::where('sub_of',$page->id)->where('status','ACTIVE')->get()  as  $sub_page)--}}

{{--                                                                <li><a href="{{url('pages/'.$sub_page->slug)}}">{{$sub_page->title}}</a></li>--}}



{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}

{{--                                                    </li>--}}


{{--                                                @endif--}}

{{--												@endforeach--}}
{{--                                            <li><a href="{{route('cources')}}">Courses</a>--}}
{{--								                <ul class="sub-menu">--}}
{{--                                                @foreach(\TCG\Voyager\Models\Category::all()  as  $cat)--}}

{{--                                                    <li><a href="#">{{ $cat->name }}</a>--}}
{{--                                                        <ul class="sub-menu">--}}
{{--                                                            @foreach(\App\Course::where('category_id', $cat->id )->get()  as  $course)--}}
{{--                                                                <li><a href="{{route('course_details',$course->id)}}">{{$course->title}}</a></li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}

{{--                                                    </li>--}}
{{--                                                @endforeach--}}
{{--								                </ul>--}}
{{--							                </li>--}}
{{--                                            <li><a href="{{route('news')}}">--}}

{{--														News--}}

{{--												</a>--}}
{{--											</li>--}}
{{--                                            <li><a href="{{route('events')}}">--}}

{{--                                                      Events--}}

{{--                                              </a>--}}
{{--                                          </li>--}}




{{--					</ul>--}}
{{--                </div>--}}







{{--                </div>--}}
{{--                <div class="col-lg-2 col-md-2 col-sm-2">--}}
{{--                    <div class="educo_call"><i class="fa fa-phone"></i><a href="#">1-220-090</a></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
