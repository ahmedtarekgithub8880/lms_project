<div class="header header-light">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand"  href="{{ route('home') }}">

                    <img src="{{ asset('assets/learn website/image 116.png') }}" alt="">
                    <span class="span_colar">Data Academy</span>


                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none">
                <ul class="nav-menu">

                    <li class="@if(\Route::currentRouteName() == 'home') active @endif">
                        <a href="{{ url('/') }}">{{ __('Home') }}<span class="submenu-indicator"></span></a>
                    </li>
                    <li class="@if(\Route::currentRouteName() == 'courese') active @endif">
                        <a href="{{ url('/courses') }}">{{ __('Courese') }}<span class="submenu-indicator"></span></a>
                    </li>

                    <li class="@if(\Route::currentRouteName() == 'about') active @endif">
                        <a href="{{ route('about') }}">{{ __('About us') }}<span class="submenu-indicator"></span></a>
                    </li>


                    <li class="@if(\Route::currentRouteName() == 'services') active @endif">
                        <a href="{{ route('services') }}">{{ __('Services') }}<span class="submenu-indicator"></span></a>
                    </li>

                    <li>
                        <a href="{{ route('cources') }}">{{ __('Our Platforms') }}<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">


                                <li>
                                    <a href="https:\\dsk.thedatacademy.com">(dsk)<span
                                            ></span></a>

                                </li>

                                <li>
                                    <a href="https:\\ds.thedatacademy.com">(ds)<span
                                            ></span></a>

                                </li>




                        </ul>
                    </li>

 <li class="@if(\Route::currentRouteName() == 'news' || \Route::currentRouteName() == 'single-news') active @endif">
                        <a href="{{ route('news') }}">{{ __('Blog') }}</a></li>


                    <li>
                        <a href="{{ route('shop') }}">{{ __('Shop') }}<span class="submenu-indicator"></span></a>
                    </li>


                    <li class="@if(\Route::currentRouteName() == 'faqs') active @endif">
                        <a href="{{ route('faqs') }}">{{ __('F&Qs') }}</a></li>
                    <li class="@if(\Route::currentRouteName() == 'get-contact') active @endif">
                        <a href="{{ route('get-contact') }}">{{ __('Contact us') }}</a></li>




                    @auth
                    <li>
                        <a href="javascript:void(0)"  onclick="openNav()" id="open2">  <i class="fa fa-shopping-basket"></i> <span  class=""> ( {{ auth()->user()->items->count() ?? 0 }} ) </span>  {{ __('Shopping Cart') }}<span class="submenu-indicator"></span></a>
                    </li>
                    @endauth

                </ul>

                <ul class="nav-menu  ">

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="pr-5">
                        <a href="#"> <i class="fa fa-globe"></i><span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                                <li>
                                    <a href="{{ route('lang' ,'ar') }}"><span>  <img style="width:20px" src="{{ asset('img/ar.png') }}"> &nbsp; {{ __('Arabic') }}</span></a>
                                    <a href="{{ route('lang' ,'en') }}"><span>  <img style="width:20px" src="{{ asset('img/en.png') }}"> &nbsp; {{ __('English') }}</span></a>
                                </li>
                        </ul>
                    </li>

                    @guest
                        <li class="login_click light">
                            <a href="#" data-toggle="modal" data-target="#login">{{ __('Sign in') }}</a>
                        </li>
                        <li class="login_click">
                            <a href="{{ route('register') }}" >{{ __('Sign up') }}</a>
                        </li>
                    @endguest
                    @auth

                            <li>
                                <a class="kjjj" href="#">
                                    @if(auth()->user()->avatar)<img style="width:25px; border-radius:50% " src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}">@endif &nbsp
                                    {{auth()->user()->name}}<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li class="">
                                        <a href="{{ route('my_dashboard') }}"> <i class="ti-home"></i> &nbsp  {{ __('My Dashboard') }}<span class="submenu-indicator"></span>
                                        </a>

                                    <li>
                                        <a href="{{ route('my_dashboard.courses') }}"> <i class="ti-book"></i> &nbsp  {{ __('My courses') }}</a>
                                    </li>

                                    <li>
                                       <a href="{{ route('favCourses') }}"> <i class="ti-heart"></i> &nbsp {{ __('Favourite Courses') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('myDashboardOrders') }}"> <i class="fa fa-money-bill-wave"></i>  &nbsp  {{ __('My orders') }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catItems') }}"> <i class="fa fa-shopping-bag"></i>  &nbsp  {{ __('My cart') }}</a>
                                    </li>
                                    <li>
                                       <a href="{{ route('wishlist') }}"> <i class="ti-heart"></i> &nbsp {{ __('Wishlist') }}</a>
                                    </li>
                                    <li class="login_click">
                                        <a href="{{ url('/logout') }} "
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out-alt"></i> &nbsp   {{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>

                            </li>

                    @endauth

            </div>
        </nav>
    </div>
</div>


<!-- Onclick Sidebar -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div id="filter-sidebar" class="filter-sidebar">
            <div class="filt-head">
                <h4 class="filt-first">{{ __('Cart products') }}</h4>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">{{ __('Close') }} <i
                        class="ti-close"></i></a>
            </div>


            @auth
                <div class="show-hide-sidebar">

                    <!-- Find New Property -->
                    <div class="sidebar-widgets">

                        <!-- Search Form -->

{{--                        <input class="form-control" name="search" type="search"--}}
{{--                               placeholder="{{ __('Search keyword') }} ..." aria-label="Search">--}}

                        <div class="clearfix"></div>
                        <br>

                        <ul class="no-ul-list mb-3">
                            @if(auth()->user()->items != [])
                            @forelse(auth()->user()->items ?? [] as $item)
                                <li>
                                  <div class="col-md-12">

                                      <a href="{{ route('singleProduct' ,$item->product->slug) }}">
                                      <img style="width: 50px" src="{{ Storage::disk('public')->url($item->product->image?? '') }}">
                                      </a>
                                      &nbsp;
                                      <a href="{{ route('singleProduct' ,$item->product->slug) }}">
                                      {{ $item->product->getTranslatedAttribute('name') }}
                                      </a>

                                         ( {{ $item->qty }} X  {{ $item->product->price }} )
                                      <br>

                                      <a  href="#" onclick="event.preventDefault(); document.getElementById('remove-item{{ $item->id }}').submit();"><p style="color : #1030e5"> <i class="fa fa-trash "></i> {{ __('Remove') }}</p> </a>

                                      <form id="remove-item{{ $item->id }}" action="{{ route('removeItemFromCart') }}" method="POST"
                                            style="display: none;">
                                          @csrf
                                          <input type="hidden" name="item_id" value="{{ $item->id }}">
                                      </form>

                                  </div>
                                </li>
                                <hr>

                            @empty
                                <p> {{ __('No items in your cart') }} </p>
                            @endforelse

                            @else
                            <p> {{ __('No items in your cart') }} </p>

                            @endif

                                <h4> {{ __('Total') }} : {{ auth()->user()->items ? auth()->user()->items->sum('final_price') : 0 }} {{ __('OMR') }}</h4>
                        </ul>
                        <br>



                        @if(auth()->user()->items->count() > 0)
                        <a  href="{{ url('checkout') }}" class="btn btn-theme full-width mb-2">{{ __('Proceed To Checkout') }}</a>
                        @else
                            <a  href="{{ url('shop') }}" class="btn btn-theme full-width mb-2">{{ __('Shop now') }}</a>
                        @endif
                    </div>

                </div>
            @endauth
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("filter-sidebar").style.width = "320px";
    }

    function closeNav() {
        document.getElementById("filter-sidebar").style.width = "0";
    }
</script>


