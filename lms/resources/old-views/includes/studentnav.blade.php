@php
    use App\Applicant;
    $user_courses=Applicant::where('user_id',Auth::user()->id )->get();

@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{URL::asset('img\logo.png')}}" data-retina="true" alt="" width="80" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                <a class="nav-link" href="{{ route('my_dashboard.courses') }}">

                    <i class="fa fa-fw fa-archive"></i>
                    <span class="nav-link-text">Courses <span class="badge badge-pill badge-primary">{{ $user_courses->count() }}</span> </span>
                </a>
            </li>



            <li class="nav-item"  data-placement="right" title="My profile">
                <a class="nav-link "  href="{{route('my_dashboard')}}" >
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="">My profile</span>
                </a>
            </li>
        </ul>



        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
