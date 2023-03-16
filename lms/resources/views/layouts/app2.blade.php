

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




    <link href="{{URL::asset('student\vendor\bootstrap\css\bootstrap.min.css')}}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{URL::asset('student\css\admin.css')}}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{URL::asset('student\vendor\font-awesome\css\font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugin styles -->
    <link href="{{URL::asset('student\vendor\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{URL::asset('student\vendor\dropzone.css')}}" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{URL::asset('student\css\custom.css')}}" rel="stylesheet">

</head>



<body>


<body class="fixed-nav sticky-footer" id="page-top">
<!-- Navigation-->



@include('includes.studentnav')

<!--Page main section start-->





<!--************
				Header End
		*************-->
    <!--************
            Home Slider Start
    *************-->
@yield('content')
<!--Footer Start
		*************-->

    @include('includes.studentfooter')


<script src="{{URL::asset('student\vendor\jquery\jquery.min.js')}}"></script>
<script src="{{URL::asset('student\vendor\bootstrap\js\bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{URL::asset('student\vendor\jquery-easing\jquery.easing.min.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{URL::asset('student\vendor\chart.js\Chart.min.js')}}"></script>
<script src="{{URL::asset('student\vendor\datatables\jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('student\vendor\datatables\dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('student\vendor\jquery.selectbox-0.2.js')}}"></script>
<script src="{{URL::asset('student\vendor\retina-replace.min.js')}}"></script>
<script src="{{URL::asset('student\vendor\jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{URL::asset('student\js\admin.js')}}"></script>
<!-- Custom scripts for this page-->
<script src="{{URL::asset('student\vendor\dropzone.min.js')}}"></script>


</body>

</html>
