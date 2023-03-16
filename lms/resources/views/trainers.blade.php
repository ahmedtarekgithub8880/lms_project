@extends('layouts.app')
@section('page_title' , __('Instructors'))
@section('page_info' , __('Instructors'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    
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
                                    
                                        <a href="{{ route('instructor' , $trainer->slug) }}"><img src="{{ Storage::disk('public')->url($trainer->image) }}"
                                                                              class="img-fluid" alt=""></a>
                                    
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
