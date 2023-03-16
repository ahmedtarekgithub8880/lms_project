@extends('layouts.app')

@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(Session::has('success'))
        <script type="text/javascript">
            swal({
                title:'Success!',
                text:"{{Session::get('success')}}",
                timer:5000,
                type:'success'
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);

        </script>
    @endif
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53204b97058a1d11"></script>


    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Online course detail</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="bg_color_1">
            <nav class="secondary_nav sticky_horizontal">
                <div class="container">
                    <ul class="clearfix">
                        <li><a href="#description" class="active">Description</a></li>
                        <li><a href="#lessons">Lessons</a></li>
                        <li><a href="#reviews">Comments</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-8">

                        <section id="description">
                            <h2>Description</h2>
                            <p>{!! $course_details->description !!}</p>
                            @if( isset($course_details->learn))
                            <h5>What will you learn</h5>
                            <ul class="list_ok">
                                    <h6>{!!  $course_details->learn !!}</h6>
                            </ul>
                            @endif
                            <hr>
                            @if( isset($course_details->requirements))
                            <h2> Requirements </h2> <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="bullets">
                                     {!!  $course_details->requirements !!}
                                    </ul>
                                </div>

                            </div>
                            @endif
                            <!-- /row -->
                        </section>
                        <!-- /section -->

                        <section id="lessons">
                            <div class="intro_title">
                                <h2>Lessons</h2>
                                <ul>
                                    <li>{{\App\Lesson::where('course_id',$course_details->id)->count() }} lessons</li>

                                    <?php
                                    $course_duration = \App\Lesson:: where('course_id' ,$course_details->id )->sum('lesson_duration');
                                    ?>
                                    <li><i class="icon_clock_alt"></i> {{ $course_duration }} h</li>
                                </ul>
                            </div>
                            <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                                <div class="card">
 
                                         <div class="card-body">
                                            <div class="list_lessons">
                                                <ul>
                                                    @foreach($lesson_data as $lesson)
                                                        <li> {{$lesson->title}} <span>{{   $lesson->lesson_duration  }}</span></li>
 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                 </div>
                                <!-- /card -->

                                <!-- /card -->
                            </div>
                            <!-- /accordion -->
                        </section>
                        <!-- /section -->

                        <section id="reviews">
                            <h2>Comments</h2>
                            <hr>
                            <div class="reviews-container">
                                <div class="review-box clearfix">
                                        @comments(['model' => $course_details])
                                </div>
                                <!-- /review-box -->
                            </div>
                            <!-- /review-container -->
                        </section>
                        <!-- /section -->
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail">
                            <figure style="width: 100%">
{{--                                <a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video"><i class="arrow_triangle-right"></i><img src="img\course_1.jpg" alt="" class="img-fluid"><span>View course preview</span></a>--}}
                            <img style="width: 100%" src=" {{ Storage::disk('public')->url($course_details->image)}}" alt="{{$course_details->title}}" >
                            </figure>

                            <div class="price">
                                <span class="original_price"> Course is available for </span>
                                <span> {{ $course_details->price > 0 ?  '$' .$course_details->price: 'Free'  }}</span>
                            </div>
                            @if(!isset($applicant) or $applicant->isEmpty())

                                <a href="@if(!isset(auth()->user()->id)) {{url('login')}} @else {{route('join',$course_details->slug)}} @endif" class="btn_1 full-width">Join Now</a>

                            @endif
{{--                            <a href="#0" class="btn_1 full-width outline"><i class="icon_heart"></i> Add to wishlist</a>--}}
                            <div id="list_feat">
                                <h3>Related Courses</h3>
                                <ul>
                                    @foreach($related_courses as $related_course)
                                        <li><a href="{{route('course_details',$related_course->id)}}"><i class="icon_document_alt"></i> {{$related_course->title}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>




@endsection
