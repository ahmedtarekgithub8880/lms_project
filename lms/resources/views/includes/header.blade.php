<head>
    <meta charset="utf-8"/>
    <meta name="author" content="LMS"/>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LMS - Online Course & Education</title>


    @if(app()->getLocale() == 'en' )
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet">

    @else
        <link href="{{ asset('assets/css/styles_ar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/colors_ar.css') }}" rel="stylesheet">
    @endif

    <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/review.css') }}" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('assets/loading.css')}}">
    @livewireStyles

    {{-- Card style --}}
</head>
