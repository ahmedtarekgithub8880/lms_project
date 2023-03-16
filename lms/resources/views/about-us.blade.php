@extends('layouts.app')
@section('page_title' , __('Who We Are?'))
@section('page_info' , __('About us'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ========================== About Facts List Section =============================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap">
                        <div class="sec-heading mb-3">
{{--                            <h2> <span class="theme-cl">{{  app()->getLocale() == 'en' ? setting('about.title_en') : setting('about.title_ar') }}</span> </h2>--}}
                        </div>

                        {!! app()->getLocale() == 'en' ? setting('about.description_en') : setting('about.description_ar') !!}

                    </div>
                    <a href="#" class="btn btn-modern">{{ __('Know More') }}<span><i class="@if(app()->getLocale() == 'en') ti-arrow-right @else ti-arrow-left @endif"></i></span></a>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap_img">

                        <iframe src="{{setting('about.video')}}" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                            

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ========================== About Facts List Section =============================== -->

    <!-- ============================ Featured Instructor Start ================================== -->
    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <p>{{ __('Meet Instructors') }}</p>
                        <h2><span class="theme-cl"></span> {{ __('Instructors') }} </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="four_slide-dots articles arrow_middle">
                        <!-- Single Slide -->
                        @forelse($trainers as $trainer)
                            <div class="singles_items">
                                <div class="instructor_wrap">
                                    <div class="instructor_thumb">
                                        <a href="{{ route('instructor' , $trainer->slug) }}"><img src="{{ Storage::disk('public')->url($trainer->image) }}"
                                                                              class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="instructor_caption">
                                        <h4><a href="{{ route('instructor' , $trainer->slug) }}">{{ $trainer->getTranslatedAttribute('name') }}</a></h4>
                                        <span>{{ $trainer->getTranslatedAttribute('job') }}</span>
                                        <ul>
                                            <li><a href="mailto:{{ $trainer->email }}" class="cl-fb"><i class="ti-email"></i></a></li>
                                            <li><a href="tel:{{ $trainer->mobile }}" class="cl-twitter"><i class="icofont-phone"></i></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            {{ __('No Instructors Yet') }}
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Featured Instructor End ================================== -->
@endsection
