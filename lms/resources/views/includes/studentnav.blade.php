<div class="dashboard-navbar">
    <div class="d-user-avater">
        <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" class="img-fluid avater" alt="">
        <h4>{{ auth()->user()->name }}</h4>
        <span>{{ auth()->user()->email }}</span>
    </div>

    <div class="d-navigation">
        <ul id="side-menu">

            <h3>{{ __('Education') }}</h3>
            
            <li class="@if (Route::currentRouteName() == 'my_dashboard') active @endif"><a href="{{ route('my_dashboard') }}"><i class="ti-user"></i>
                    {{ __('My Profile') }}  </a></li>
            @if(auth()->user()->parent_id != null)                        
                <li class="@if (Route::currentRouteName() == 'my_dashboard.courses') active @endif"><a href="{{ route('my_dashboard.courses') }}"><i
                        class="ti-layers"></i>{{ __('My Courses') }}</a></li>
            

            <li class="@if (Route::currentRouteName() == 'favCourses') active @endif"><a href="{{ route('favCourses') }}"><i
                        class="ti-heart"></i>{{ __('Favourites') }}</a></li>
            @endif
        @if(auth()->user()->parent_id == null)                        
            <li class="@if (Route::currentRouteName() == 'my_dashboard.kids') active @endif"><a href="{{ route('my_dashboard.kids') }}"><i
                        class="ti-id-badge"></i>{{ __('My Kids') }}</a></li>                        
        @endif            
                        <hr>
            <h3>{{ __('Shop') }}</h3>

            <li class="@if (Route::currentRouteName() == 'myDashboardOrders') active @endif"><a href="{{ route('myDashboardOrders') }}"><i class="fa fa-money-bill-wave"></i>{{ __('My orders') }}</a></li>
            <li class="@if (Route::currentRouteName() == 'dashboard-wishlist') active @endif"><a href="{{ route('dashboard-wishlist') }}"><i class="ti-heart"></i>{{ __('Wishlist') }}</a></li>
            <li class="@if (Route::currentRouteName() == 'mycatItems') active @endif"><a href="{{ route('mycatItems') }}"><i class="ti-shopping-cart"></i>{{ __('My cart') }}</a></li>
            <li><a href="{{ url('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti-power-off"></i>{{ __('Logout') }}</a></li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </ul>
    </div>
</div>
