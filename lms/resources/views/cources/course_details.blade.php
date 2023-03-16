@extends('layouts.app')

@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (Session::has('success'))
        <script type="text/javascript">
            swal({
                title: 'Success!',
                text: "{{ Session::get('success') }}",
                timer: 5000,
                type: 'success'
            }).then((value) => {
                //location.reload();
            }).catch(swal.noop);
        </script>
    @endif

<style>
    
.rating-overview border.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;    
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>
    <!-- ============================ Course Header Info Start================================== -->
    <div class="image-cover ed_detail_head lg theme-ov"
        style="background:#f4f4f4 url({{ asset('assets/img/banner-4.jpg') }})" data-overlay="9">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-7">
                    <div class="ed_detail_wrap light">
                        <ul class="cources_facts_list">
                            <li class="facts-1">{{ $course_details->category?$course_details->category->getTranslatedAttribute('name') : '' }}</li>

                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $course_details->getTranslatedAttribute('title') }}</h2>
                            <ul>
                                <?php
                                $course_duration = \App\Lesson::where('course_id', $course_details->id)->sum('lesson_duration');
                                $courseApplicantsCount = \App\Applicant::where('course_id', $course_details->id)->count();
                                $comments_count = \App\Comment::where('commentable_type', 'App\Course')
                                    ->where('commentable_id', $course_details->id)
                                    ->count();
                                ?>

                                <li><i class="ti-calendar"></i> {{ $course_details->lessons->count() ?? 0 }} {{ __('Lessons') }}
                                </li>
                                <li><i class="ti-user"></i>{{ $courseApplicantsCount }} {{ __('Student Enrolled') }}</li>
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>{!! $course_details->getTranslatedAttribute('description') !!}</p>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Course Header Info End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8">

                    <!-- Overview -->
                    <div class="edu_wraper border">
                        <h4 class="edu_title">{{ __('Course Overview') }}</h4>
                        <p> {!! $course_details->getTranslatedAttribute('learn') !!} </p>
                        <h6>{{ __('Requirements') }}</h6>
                        {!! $course_details->getTranslatedAttribute('requirements') !!}
                    </div>

                    @if(isset($introduction))
                    <div class="edu_wraper border">
                        <h4 class="edu_title">{{ __('Course Introduction') }}</h4>
                        <div id="accordionExample" class="accordion shadow circullum">

                            <!-- Part 1 -->
                            <div class="card">
                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                            class="d-block position-relative text-dark collapsible-link py-2">

                                           {{ __('Introduction To This Course') }} </a></h6>
                                </div>
                                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample"
                                    class="collapse show">
                                    <div class="card-body pl-3 pr-3">


                                            <iframe src="https://player.vimeo.com/video/{{ $introduction->link }}" width="100%" height="400" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endif


                    <div class="edu_wraper border">
                        <h4 class="edu_title">{{ __('Course Circullum') }}</h4>
                        <div id="accordionExample" class="accordion shadow circullum">

                            <!-- Part 1 -->
                            <div class="card">
                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                            class="d-block position-relative text-dark collapsible-link py-2">

                                           {{ __('Lessons of this course') }} </a></h6>
                                </div>
                                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample"
                                    class="collapse show">
                                    <div class="card-body pl-3 pr-3">
                                        <ul class="lectures_lists">
                                            @foreach ($lesson_data as $key => $lesson)
                                            @if(isset($applicant) && $applicant->approve == 1)


                                            @php
                                                    $video = \App\Video::where('lesson_id',$lesson->id)->where('group_id',$applicant->group_id)
                                                        ->first();
                                            @endphp


{{--                                                <a href="{{$video->link??'#'}}"><li class="view">--}}
                                                <a href="{{route('lesson' , [$lesson->slug , $lesson->course->slug])}}"><li class="view">
                                                <div class="lectures_lists_title"><i class="ti-control-play"></i>{{ __('Lecture') }}: {{ $key + 1 }}
                                                        </div>{{  $lesson->getTranslatedAttribute('title') }}
                                                    </li>
                                                </a>
                                            @else
                                                    <li class="unview">
                                                    <div class="lectures_lists_title"><i class="ti-control-play"></i>{{ __('Lecture') }}: {{ $key + 1 }}
                                                        </div>{{ $lesson->getTranslatedAttribute('title') }}
                                                    </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                     <!-- Reviews -->
                     
                    
                     
                    


                    <!-- Reviews -->


                    
                    <div class="list-single-main-item fl-wrap border">
                    
                    <div class="list-single-main-item-title fl-wrap">
                            <h3>{{ __('Course Reviews') }} <span> ({{ $comments_count }}) </span></h3>
                        </div>
                        @auth
                        <div class="rating-overview border">
                        <div class="rating-overview-box">
                            <span class="rating-overview-box-total">{{$course_ratings}}</span>
                            <span class="rating-overview-box-percent">out of 5.0</span>

                        </div>
                        <form action="{{route('update-rate')}}" method="post" id="form1" >
                            @csrf
                            <div class="rate" style="margin:auto ;">
                                <input type="hidden" name="course_id" value="{{$course->id}}" />
                                    <input type="radio" onchange="this.form.submit();"  id="star5" name="rate" value="5" />
                                    <label for="star5"   title="text">5 stars</label>
                                    <input type="radio" onchange="this.form.submit();"  id="star4" name="rate" value="4" />
                                    <label for="star4"   title="text">4 stars</label>
                                    <input type="radio" onchange="this.form.submit();"  id="star3" name="rate" value="3" />
                                    <label for="star3"   title="text">3 stars</label>
                                    <input type="radio" onchange="this.form.submit();"  id="star2" name="rate" value="2" />
                                    <label for="star2"   title="text">2 stars</label>
                                    <input type="radio" onchange="this.form.submit();"  id="star1" name="rate" value="1" />
                                    <label for="star1"   title="text">1 star</label>
                            </div>
                        </form>
                    
                    
                    </div>
                    @endauth
                        <section id="reviews">

                            <div class="reviews-container">
                                <div class="review-box clearfix">
                                    @comments(['model' => $course_details])
                                </div>
                                <!-- /review-box -->
                            </div>
                            <!-- /review-container -->
                        </section>

                    </div>


                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box border">

                        {{-- <div class="property_video sm"> --}}
                        <div class="">
                            <div class="thumb">
                                <img class="pro_img img-fluid w100"
                                    src="{{ Storage::disk('public')->url($course_details->image) }}"
                                    alt="{{ $course_details->getTranslatedAttribute('title') }}"
                                    style=" object-fit: cover;">
                                {{-- <div class="overlay_icon">
                                    <div class="bb-video-box">
                                        <div class="bb-video-box-inner">
                                            <div class="bb-video-box-innerup">
                                                <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal"
                                                    data-target="#popup-video" class="theme-cl"><i
                                                        class="ti-control-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <div class="ed_view_price">
                            <br>
                            <span>{{ __('Price') }}</span>
                            <h2 class="theme-cl"> {{ $course_details->price }} {{ __('OMR') }}</h2>
                            <p>
                               <b> {{ __('Add to favourite') }}</b>
                                <a  href="javascript:void(0)"  onclick='event.preventDefault(); document.getElementById("course{{ $course_details->id }}").submit();' class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                                    title="{{ __('Add to favourite') }}"><i style="color: #0dd6ea; " class="ti-heart"></i></a>
                            </p>

                            <form id="course{{ $course_details->id }}" action="{{ route('addCourseToFav' , ['course_id' => $course_details->id]) }}" method="post"
                                  style="display: none;">
                                @csrf

                            </form>
                        </div>
                        <div class="ed_view_features">
                            {{-- <span>Course Features</span> --}}
                            {{-- <ul>
                                <li><i class="ti-angle-right"></i>Fully Programming</li>
                                <li><i class="ti-angle-right"></i>Help Code to Code</li>
                                <li><i class="ti-angle-right"></i>Free Trial 7 Days</li>
                                <li><i class="ti-angle-right"></i>Unlimited Videos</li>
                                <li><i class="ti-angle-right"></i>24x7 Support</li>
                            </ul> --}}
                        </div>
                        @if(!isset($applicant))
                        <div class="ed_view_link">
                            <a href="@if (!isset(auth()->user()->id)) {{ url('login') }} @elseif($course->price == 0){{ route('join', $course_details->slug) }} @else {{ route('payment', $course->slug) }} @endif"
                                class="btn btn-theme enroll-btn">{{ __('Enroll Now') }}</a>
                        </div>
                        @else

                        @endif

                    </div>

                    <div class="edu_wraper border">
                        <h4 class="edu_title">{{ __('Related courses') }} </h4>
                        <ul class="edu_list right">


                            @foreach ($related_courses as $related_course)
                                <li><a href="{{ route('course_details', $related_course->slug) }}"><i
                                            class="ti-files"></i> {{ $related_course->getTranslatedAttribute('title') }} </a> </li>
                            @endforeach


                        </ul>
                    </div>

                    

                </div>

            </div>
        </div>
    </section>
    
    <!-- ============================ Course Detail ================================== -->
@endsection
