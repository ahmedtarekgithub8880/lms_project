@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('page_title' , __('Events'))
@section('page_info' , __('Latest events'))
@section('content')

    <!-- ============================ Page Title Start================================== -->
    @include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ========================== Articles Section =============================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">
            @forelse( $events as $event)
                <!-- Single Article -->
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="articles_grid_style">
                        <a href="{{ route('single_event' , $event->slug) }}">
                            <div class="articles_grid_thumb">
                                    <img
                                            src="{{ Storage::disk('public')->url($event->image) }}"  class="img-fluid"
                                            alt="{{$event->getTranslatedAttribute('title')}}" style="width:100%;height:250px;" />
                                </div>

                                <div class="articles_grid_caption">
                                    <h4>{{$event->getTranslatedAttribute('title')}}</h4>
                                    <div class="articles_grid_author">
                                        <span
                                            class="fa fa-calendar">  {{ __('Start at') }}: {{ $event->start_date->format('F d') }} @ {{ $event->start_date->format('h:i A')  }} </span>
                                    </div>
                                    <div class="articles_grid_author">
                                        <span
                                            class="fa fa-calendar">  {{ __('End at') }}: {{ $event->end_date->format('F d') }} @ {{ $event->end_date ->format('h:i A')  }} </span>
                                    </div>
                                    <div class="articles_grid_author">

                                        <h4><b>{{ __('Organizer') }}</b> : {{ $event->getTranslatedAttribute('organizer') }}</h4>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>

                @empty

                    {{ __('No Events Found') }}

                @endforelse

            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            {{ $events->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Row -->

        </div>
    </section>
    <!-- ========================== Articles Section =============================== -->

@endsection
