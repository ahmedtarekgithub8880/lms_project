@extends('layouts.app')

@section('content')
    <section class="gray pt-5">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-md-3">

                    @include('includes.studentnav')

                </div>

                <div class="col-lg-9 col-md-9 col-sm-12">

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ __('My Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Courses') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <!-- Course Style 1 For Student -->
                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="dashboard_fl_1">
                                        <h4>{{ __('My Courses') }}</h4>
                                    </div>
                                    <div class="dashboard_fl_2">
                                        <ul class="mb0">
                                            <li class="list-inline-item">

                                            </li>
                                            {{-- <li class="list-inline-item">
                                                <form class="form-inline my-2 my-lg-0">
                                                    <input class="form-control" type="search" placeholder="Search Courses"
                                                        aria-label="Search">
                                                    <button class="btn my-2 my-sm-0" type="submit"><i
                                                            class="ti-search"></i></button>
                                                </form>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">

                                    @foreach ($user_courses as $user_course)
                                        <!-- Single Course -->
                                        <div class="dashboard_single_course">
                                            <div class="dashboard_single_course_thumb">
                                                <img src="{{ Storage::disk('public')->url($user_course->Course->image) }}"
                                                    class="img-fluid" alt="" />
                                                <div class="dashboard_action">
                                                    @if ($user_course->approve == 1)

                                                        <li><a href="
                                                        
                                                        {{ route('course_details', $user_course->Course->slug) }}
                                                        "
                                                                class="btn btn-ect"> {{ __('See More') }}</a></li>
                                                    @else
                                                        <li><a href="#"
                                                                class="btn btn-ect"> {{ __('Not Approved Yet') }}</a></li>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="dashboard_single_course_caption">
                                                <div class="dashboard_single_course_head">
                                                    <div class="dashboard_single_course_head_flex">
                                                        <h4 class="dashboard_course_title">
                                                            {{ $user_course->Course->getTranslatedAttribute('title') }}</h4>
                                                        {{-- <span class="dashboard_instructor">Adam Wilson</span> --}}
                                                        @if ($user_course->approve == 0)
                                                            <i class="pending">{{ __('Pending') }}</i>
                                                        @else
                                                            <i class="approved">{{ __('Active') }}</i>
                                                        @endif

                                                        <div class="dashboard_rats">
                                                            <div class="dashboard_rating">
                                                                @for($i=1 ; $i <= 5;  $i++)
                                                                <i class="ti-star @if($i <= $user_course->Course->rate) filled @endif "></i>

                                                                @endfor

                                                            </div>
                                                            @php  $comments_count = \App\Comment::where('commentable_type' , 'App\Course')->where('commentable_id',$user_course->Course->id )->count(); @endphp
                                                            <span>({{  $comments_count }} Reviews)</span>
                                                        </div>
                                                    </div>
                                                    <div class="dc_head_right">
                                                        <h4 class="dc_price_rate theme-cl">
                                                            {{ $user_course->Course->price }}  {{ __('OMR') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="dashboard_single_course_des">
                                                    <p> {!! $user_course->Course->getTranslatedAttribute('description') !!}</p>

                                                </div>
                                                <div class="dashboard_single_course_progress">
                                                    <div class="dashboard_single_course_progress_1">
                                                        {{-- <label>82% Completed</label> --}}
                                                        {{-- <div class="progress">
                                                            <div class="progress-bar progress-bar-striped bg-success"
                                                                role="progressbar" style="width: 82%" aria-valuenow="82"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div> --}}
                                                    </div>
                                                    {{-- <div class="dashboard_single_course_progress_2">
                                                        <ul class="m-0">
                                                            <li class="list-inline-item"><i class="ti-user mr-1"></i>4512
                                                                Enrolled</li>
                                                            <li class="list-inline-item"><i
                                                                    class="ti-comment-alt mr-1"></i>112 Comments</li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Row -->

                </div>

            </div>
            <!-- Row -->

        </div>
    </section>

@endsection
