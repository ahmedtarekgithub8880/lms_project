

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img\favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img\apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img\apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img\apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img\apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{URL::asset('css\bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css\style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css\vendors.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css\icon_fonts\css\all_icons.min.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{URL::asset('css\custom.css')}}" rel="stylesheet">

    <!-- MODERNIZR SLIDER -->
    <script src="{{URL::asset('js\modernizr_slider.js')}}"></script>

</head>



<body>
<!--Page main section start-->
<div id="page">

		@include('includes.header')





		<!--************
				Header End
		*************-->
		<!--************
				Home Slider Start
		*************-->
                @yield('content')
				<!--Footer Start
		*************-->

		            @include('includes.footer')

        </div>


<script src="{{URL::asset('js\jquery-2.2.4.min.js')}}"></script>
<script src="{{URL::asset('js\common_scripts.js')}}"></script>
<script src="{{URL::asset('js\main.js')}}"></script>
<script src="{{URL::asset('assets\validate.js')}}"></script>



<!-- FlexSlider -->
<script defer="" src="{{URL::asset('js\jquery.flexslider.js')}}"></script>
<script>
    $(window).load(function() {
        'use strict';
        $('#carousel_slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 280,
            itemMargin: 25,
            asNavFor: '#slider'
        });
        $('#carousel_slider ul.slides li').on('mouseover', function() {
            $(this).trigger('click');
        });
        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel_slider",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
@yield('scripts')

</body>

</html>
