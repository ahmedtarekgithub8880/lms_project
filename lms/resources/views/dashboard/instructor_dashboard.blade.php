@extends('layouts.app')

@section('content')

    <!-- ============================ Instructor header Start================================== -->
    <div class="image-cover ed_detail_head invers" style="background:#f4f5f7;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="viewer_detail_wraps">
                        <div class="viewer_detail_thumb">
                            <img src="{{ Storage::disk('public')->url($trainer->image) }}" class="img-fluid" alt=""/>
                            <div class="viewer_status">pro</div>
                        </div>
                        <div class="caption">
                            <div class="viewer_package_status">{{ $trainer->experience }} Year Expe.</div>
                            <div class="viewer_header">
                                <h4>{{ $trainer->name }}</h4>
                                <span class="viewer_location">{{ $trainer->job }}</span>
                                <ul class="mt-2">
                                    <li><strong>{{ $trainer->courses->count() }}</strong> Courses</li>
                                    <li><strong>{{ $trainer->groups->count() }}</strong> Groups</li>
                                    <li><strong>{{ $trainer->lessons->count() }}</strong> Lessons</li>
                                </ul>
                            </div>
                            <div class="viewer_header">
                                <ul class="badge_info">
                                    <li class="started"><i class="ti-rocket"></i></li>
                                    <li class="medium"><i class="ti-cup"></i></li>
                                    <li class="platinum"><i class="ti-thumb-up"></i></li>
                                    <li class="elite unlock"><i class="ti-medall"></i></li>
                                    <li class="power unlock"><i class="ti-crown"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================ Instructor header End ================================== -->

    <!-- ============================ Instructor Detail ================================== -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="custom-tab customize-tab tabs_creative">
                        <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="false">Courses</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="contact" aria-selected="false">Groups</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <!-- Education -->
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="details_single p-2">
                                    <h2>Description</h2>
                                    <ul class="skills_info">
                                        {!! $trainer->description !!}
                                    </ul>
                                </div>
                            </div>

                            <!-- Classess -->
                            <div class="tab-pane fade  p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">

                                    <!-- Single Course -->
                                    @forelse($trainer->courses as $course)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="edu-watching">
                                                <div class="property_video sm">
                                                    <div class="thumb">
                                                        <img class="pro_img img-fluid w100"
                                                             src="{{ Storage::disk('public')->url( $course->image ) }}"
                                                             alt="{{ $course->title }}">
                                                        <div class="overlay_icon">
                                                            <div class="bb-video-box">
                                                                <div class="bb-video-box-inner">
                                                                    <div class="bb-video-box-innerup">
                                                                        <a href="{{ route('course_details' , $course->slug) }}"
                                                                           class="theme-cl"><i
                                                                                class="ti-control-play"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edu_duration"><span class="fa fa-clock"></span>
                                                        &nbsp {{ $course->lessons->sum('lesson_duration') }}</div>
                                                </div>
                                                <div class="edu_video detail">
                                                    <div class="edu_video_header">
                                                        <h4>
                                                            <a href="{{ route('course_details' , $course->slug) }}">{{ $course->title }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="edu_video_bottom">
                                                        <div class="edu_video_bottom_left">
                                                            <span> ({{ $course->lessons->count() }}) Lessons </span>
                                                        </div>
                                                        <div class="edu_video_bottom_right">
                                                            <i class="ti-desktop"></i>{{ $course->category->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse


                                </div>
                            </div>


                            <!-- Reviews -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
{{--                                <div class="reviews-comments-wrap">--}}
                                <div class="">
                                    <br>
                                    <!-- reviews-comments-item -->


                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            {{--                                            <img src="assets/img/user-1.jpg" class="img-fluid" alt="">--}}
                                        </div>

                                        @forelse($trainer->groups as $group)
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">{{ $group->name }}</a>    </h4>

                                                <div class="clearfix"></div>

                                                @if($group->course)
                                                <div class="pull-left reviews-reaction">
                                                    <table class="table-bordered" style="width: 100%; height: 200px">
                                                        <tr>
                                                            <th style="text-align: center" colspan="2"><a href="{{ route('course_details' ,  $group->course->slug) }}">
                                                                </a> Course :  {{ $group->course->title }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center" >
                                                                Day
                                                            </th>
                                                            <th style="text-align: center" >
                                                                Time
                                                            </th>
                                                        </tr>
                                                        @forelse($group->groupTimes as $row)
                                                            <tr style="text-align: center" >
                                                                <td>{{ $row->getDay() }}</td>
                                                                <td>{{ $row->group_time }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td>--</td>
                                                                <td>--</td>
                                                            </tr>
                                                        @endforelse
                                                    </table>
                                                </div>
                                                @else
                                                {{__("No Courses")}}
                                                @endif
                                                <hr>
                                            </div>

                                        @empty
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">No Groups Yet</a></h4>

                                            </div>
                                        @endforelse

                                    </div>

                                    <!--reviews-comments-item end-->


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Instructor Detail ================================== -->

@endsection
