<html lang="{{ app()->getLocale() }}" dir="@if(app()->getLocale() == 'en') ltr  @else rtl @endif">

    @include('includes.header')

    <body class="blue-skin" style="direction: @if(app()->getLocale() == 'en') ltr  @else rtl @endif !important">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			@include('includes.nav')

			<!-- End Navigation -->
			<div class="clearfix">

                @yield('content')

            </div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
            <div style="width: 102%">
                @include('includes.footer')
            </div>



			<!-- ============================== Start Newsletter ================================== -->

			<!-- ============================ Footer End ================================== -->

                @include('includes.modals')
			<!-- End Modal -->

			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


		</div>


		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
         @include('includes.scripts')

        <!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>

</html>
