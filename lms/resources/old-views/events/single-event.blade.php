@extends('layouts.app')

<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>

@section('content')



    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>{{$event->title}}</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bloglist singlepost">
                        <p><img alt="{{$event->title}}" class="img-fluid" src="{{ Storage::disk('public')->url($event->image) }}"></p>
                        <h1>{{$event->title}}</h1>
                        <div class="postmeta">
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">

                            <p>  {!! $event->description !!}</p>



                            <div class="ed_event_single_address_info ed_toppadder40 ed_bottompadder40">
                                <h4 class="ed_bottompadder30">Details</h4>
                                <p>Date & Time: <span>{{ $event->start_date->format('F d') }} @ {{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A')  }} </span></p>
                                <p>Organizer: <span>{{ $event->organizer }}</span></p>
                                <p>Phone: <span>{{ $event->phone }}</span></p>
                                <p>Email: <a href="mailto:{{ $event->email }}" > {{ $event->email }}</a></p>
                                <p>Website: <a target="_blank" href="{{ $event->website }}  ">{{ $event->website }}</a></p>


                                <div id="map" style=" width: 100%;height: 350px;"></div>



                        </div>




                            <script type="application/javascript">
                                function initMap() {
                                        @forelse($event->getCoordinates() as $point)
                                    var center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};

                                        @empty
                                    var center = {lat: {{ config('voyager.googlemaps.center.lat') }}, lng: {{ config('voyager.googlemaps.center.lng') }}};
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
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('voyager.googlemaps.key') }}&callback=initMap"></script>


                    </div>
                        <!-- /post -->
                    </div>
                    <!-- /single-post -->

                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    @include('includes.right-section')
                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>



`@endsection
