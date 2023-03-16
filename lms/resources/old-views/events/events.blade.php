@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')


    <main>


        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">


                    @foreach($events as $event)



                        <article class="blog wow fadeIn">
                            <div class="row no-gutters">
                                <div class="col-lg-7">
                                    <figure>
                                        <a href="{{ route('single_event' , $event->slug) }}"><img src="{{ Storage::disk('public')->url($event->image) }}" alt="{{$event->title}}">
                                            <div class="preview"><span>Read more</span></div>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-lg-5">
                                    <div class="post_info">
                                        <small>{{ $event->start_date->format('F d') }} @ {{ $event->start_date->format('h:i A') }} - {{ $event->end_date->format('h:i A')  }}</small>

                                        <h3><a href="{{ route('single_event' , $event->slug) }}">{{$event->title}}</a></h3>
                                        <p>  {!! Str::limit($event->description , 220 , '...') !!}</p>
                                    </div>



                                </div>
                            </div>
                        </article>
                        <!-- /article -->
                    @endforeach

{{--                    <nav aria-label="...">--}}
{{--                        <ul class="pagination pagination-sm">--}}
{{--                            {{ $event->links() }}--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
                    <!-- /pagination -->
                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    <div class="widget">



                    @include('includes.right-section')

                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
















@endsection







