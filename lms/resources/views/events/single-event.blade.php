@extends('layouts.app')
@section('page_title' , $event->getTranslatedAttribute('title'))
@section('page_info' , __('Event'))
@section('content')


    <!-- ============================ Page Title Start================================== -->
    @include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section class="gray">

        <div class="container">

            <!-- row Start -->
            <div class="row">

                <!-- Blog Detail -->
                <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="article_detail_wrapss single_article_wrap format-standard">
                        <div class="article_body_wrap">

                            <div class="article_featured_image">
                                <img class="img-fluid" src="{{ Storage::disk('public')->url($event->image) }}"  alt="">
                            </div>


                            <h2 class="post-title">{{ $event->getTranslatedAttribute('title') }}</h2>
                            {!! $event->getTranslatedAttribute('description') !!}

                            <div class="row">
                                <div class="col-md-5">
                                    <h4 class="post-title">{{ __('Event Details') }}</h4>
                                    <blockquote style="font-size: 16px">
                                        <div class="articles_grid_caption">

                                            <div class="articles_grid_author">
                                                <span class="fa fa-calendar">  {{ __('Start at') }}: {{ $event->start_date->format('F d') }} @ {{ $event->start_date->format('h:i A')  }} </span>
                                            </div>
                                            <div class="articles_grid_author">
                                                <span class="fa fa-calendar">  {{ __('End at') }}: {{ $event->end_date->format('F d') }} @ {{ $event->end_date ->format('h:i A')  }} </span>
                                            </div>
                                            <div class="articles_grid_author">
                                                <span class="fa fa-phone"> <a
                                                        href="tel:{{ $event->phone }}">{{ $event->phone }}</a> </span>
                                            </div>

                                            <div class="articles_grid_author">
                                                <span class="icofont-email"><a
                                                        href="mailto:{{ $event->email }}"> {{ $event->email }}</a> </span>
                                            </div>
                                            <div class="articles_grid_author">
                                                <span class="fa fa-globe"> <a
                                                        href="{{ $event->website }}">{{ $event->website }}</a> </span>
                                            </div>
                                            <div class="articles_grid_author">

                                                <h4><b>{{ __('Organizer') }}</b> : {{ $event->organizer }}</h4>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <div class="col-md-7">
                                    <h4 class="post-title">{{ __('Location') }}</h4>
                                    <div id="map" style="width: 100%;height: 350px;"></div>
                                </div>

                            </div>


                        </div>
                    </div>



                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">

                    <!-- Searchbard -->
                    <div class="single_widgets widget_search">
                        <h4 class="title">{{ __('Search') }}</h4>
                        <form method="get" action="{{ route('events') }}" class="sidebar-search-form">
                            <input type="search" name="search" placeholder="{{ __('Search') }}..">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>


                    <!-- Trending Posts -->
                    <div class="single_widgets widget_thumb_post">
                        <h4 class="title">{{ __('Trending Events') }}</h4>
                        <ul>
                            @forelse($events as $data)
                                <li>
										<span class="left">
                                            <a href="{{ route('single_event' , $data->slug) }}">
								    			<img src="{{ Storage::disk('public')->url($data->image) }}" alt=""
                                                     class="">
                                            </a>
										</span>
                                    <span class="right">
											<a class="feed-title"
                                               href="{{ route('single_event' , $data->slug) }}">{{ $data->getTranslatedAttribute('title') }}</a>
											<span class="post-date"><i class="ti-user"></i>{{ $data->getTranslatedAttribute('organizer') }}</span>
										</span>
                                </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>

                </div>
           <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="prc_wrap">

                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">{{ __('Fill up The Form') }}</h4>
                    </div>

                    <form action=" {{route('store-event')}} " method="post" >
                        @csrf

                    <div class="prc_wrap-body">
                    
                        <input type="hidden" name="event_id" value="{{ $event->id }}" >
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" class="form-control simple">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control simple">
                                </div>
                            </div>
                        

                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                        <label>{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control simple">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <button class="btn btn-theme" type="submit">{{__('Send')}}</button>
                        </div>
                    </div>
                    </form>

                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    {{--    @dd($event->getCoordinates())--}}
    <!-- ============================ Agency List End ================================== -->
    <script type="application/javascript">
        function initMap() {
            @forelse($event->getCoordinates() as $point)
            var center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};

            @empty
            var center = {
                lat: {{ config('voyager.googlemaps.center.lat') }},
                lng: {{ config('voyager.googlemaps.center.lng') }}
            };
            @endforelse
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: {{ config('voyager.googlemaps.zoom') }},
                center: center
            });
            var markers = [];
            @foreach($event->getCoordinates() as $point)
            var marker = new google.maps.Marker({
                position: {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}},
                map: map
            });
            markers.push(marker);
            @endforeach
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ config('voyager.googlemaps.key') }}&callback=initMap"></script>



@endsection
