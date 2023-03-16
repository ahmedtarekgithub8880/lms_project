<!-- ============================ Page Title Start================================== -->
<section class="page-title" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap" style="margin-top: 30px">
                    <h1 class="breadcrumb-title">@yield('page_title')</h1>
                    
                    <nav aria-label="breadcrumb" style="margin-top: 20px">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page_info')</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
