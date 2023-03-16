@extends('layouts.app')

@section('content')
    <!-- ============================ Page Title Start================================== -->


    <!-- ============================ Course Header Info Start================================== -->
    <div class="image-cover ed_detail_head lg theme-ov"
         style="background:#f4f4f4 url({{ asset('assets/img/banner-4.jpg') }})" data-overlay="9">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-7">
                    <div class="ed_detail_wrap light">
                        <ul class="cources_facts_list">
                            <li class="facts-1">{{ $lesson->course->category?$lesson->course->category->getTranslatedAttribute('name') : '' }}}</li>

                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $lesson->course->getTranslatedAttribute('title') }}</h2>
                            <ul>
                                <?php
                                $course_duration = \App\Lesson::where('course_id', $lesson->course->id)->sum('lesson_duration');
                                $courseApplicantsCount = \App\Applicant::where('course_id', $lesson->course->id)->count();
                                $comments_count = \App\Comment::where('commentable_type', 'App\Course')
                                    ->where('commentable_id', $lesson->course->id)
                                    ->count();
                                ?>
{{--                                <li><i class="ti-control-forward"></i>{{ $course_duration }} {{ __('hours') }} </li>--}}
{{--                                <li><i class="ti-calendar"></i> {{ $lesson->course->lessons->count() ?? 0 }} {{ __('Lessons') }}--}}
                                </li>
{{--                                <li><i class="ti-user"></i>{{ $courseApplicantsCount }} {{ __('Student Enrolled') }}</li>--}}
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>{!! $lesson->course->getTranslatedAttribute('description') !!}</p>
                        </div>

                        <div class="ed_rate_info">
                            <div class="star_info">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ti-star @if ($i <= $lesson->course->rate) filled @endif "></i>
                                @endfor
                            </div>
                            <div class="review_counter">
                                <strong class="high">{{ $lesson->course->rate }}</strong>
                                ({{ $comments_count }} {{ __('Reviews') }} )
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Course Header Info End ================================== -->



    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">


                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <!-- <ul class="cources_facts_list">
                            <li class="facts-1">SEO</li>
                            <li class="facts-5">Design</li>
                        </ul> -->
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{$lesson->getTranslatedAttribute('title')}}</h2>
                            <ul>
                                <li><i class="ti-calendar"></i>{{$lesson->assignments->count()}} {{ __('Assignments') }}</li>
                                <li><i class="ti-control-forward"></i>{{$lesson->resources->count()}} {{ __('Resources') }}</li>
                                <li><i class="ti-control-play"></i>{{ $lesson->lesson_duration }} {{ __('Minutes') }}</li>
                            </ul>
                        </div>
                    <!-- <div class="ed_header_short">
									<p>{!! $lesson->getTranslatedAttribute('description') !!}.</p>
								</div> -->

                        <!-- <div class="ed_rate_info">
                            <div class="star_info">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review_counter">
                                <strong class="high">4.7</strong> 3572 Reviews
                            </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row">


                <div class="col-lg-12 col-md-12">

                    @if($lesson->course->type == 2)
                        <div class="edu_wraper" style="padding:10px;">

                            @if(!$video->isEmpty())
                                <p>
                                    @foreach( $video  as  $vid )

                                        <iframe src="https://player.vimeo.com/video/{{ $vid->link }}" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>

                                    @endforeach
                                </p>

                            @else
                                <h2> {{ __('There is No Video') }} </h2>
                            @endif

                        </div>

                @elseif($lesson->course->type == 1)
                
                        @if($meeting_id!=Null)
                            <div class="iframe-container" style="overflow: hidden; padding-top: 56.25%; position: relative;">
                                @php $url = "https://success.zoom.us/wc/join/$meeting_id" @endphp

                         	<iframe allow="microphone; camera" style="border: 0; height: 100%; left: 0; position: absolute; top: 0; width: 100%;" src="{{ $url }}" frameborder="0"></iframe>
                        	</div>
                        @else
                        <div class="edu_wraper"><h3>No Meeting Added for this lesson yet</h3></div>
                        @endif
                
                        @else
                @endif

                </div>
                <div class="col-lg-8 col-md-8">
                
                
                 @if($previous  != NULL)
                    <button class="btn btn-theme enroll-btn pull-left"  ><a type="button" href="{{route('lesson',[$previous_slug[0]['slug'],$course->slug])}}"  style="color: white;">{{ __('Previous lesson') }}</a></button>

                @endif

                @if($next != NULL)
                    <button  class="btn btn-theme enroll-btn pull-right"><a type="button" class=" btn-theme enroll-btn" href=" {{route('lesson',[$next_slug[0]['slug'],$course->slug])}}" >{{ __('Next lesson') }}</a></button>

                @endif
                    <!-- Overview -->
                    <div class="edu_wraper">
                        <h4 class="edu_title">{{ __('Lesson Overview') }}</h4>
                        {!! $lesson->getTranslatedAttribute('description') !!}

                    </div>

                    <div class="edu_wraper">
                        <h4 class="edu_title">{{ __('Lesson Resources') }}</h4>
                        <ul class="lists-3">
                            @forelse($lesson->resources as $r)
                                @foreach(json_decode( $r['link'] ) as  $vid )
                                    <a href="{{  Storage::disk('public')->url($vid->download_link)  }}" target="_blank"><i
                                            class="fa fa-chevron-right"></i> {{$r->title}} </a>
                                    <br>
                                @endforeach
                            @empty
                                {{ __('No resources Founded') }}
                            @endforelse
                        </ul>
                    </div>

                    <div class="edu_wraper">
                        <h4 class="edu_title">{{ __('Lesson Assignments') }}</h4>
                        <ul class="lists-3">
                            @forelse($lesson->assignments as $r)
                                            
                            <h2>{{$r->getTranslatedAttribute('title')}}</h2>
                            <div class="row">    
                            @foreach(json_decode( $r['file'] ) as  $vid )
                                    
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <a href="{{Storage::disk('public')->url($vid->download_link)  }}" target="_blank"><i class="fa fa-chevron-right"></i>{{$vid->original_name}}</a>
                                    </div>
                            
                                @endforeach
                                
                                </div>
                                <br>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">{{__('upload')}} </a>
                                    </div>

                                    <form action="{{route('store-resolves')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('file') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <input class="form-control" type="hidden" name="assignment_id" value="{{$r->id}}">
                                                    <input class="form-control" type="hidden" name="user_id" value="{{auth()->id()}}">
                                                    <input class="form-control" type="file" name="file" id="fileToUpload">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                                                        <button type="submit" class="btn btn-primary">{{ __('upload') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                            
                            @empty
                                {{ __('No Assignment Founded') }}
                            @endforelse
                        </ul>
                    </div>


                    
                            
                                
                                
                            


                      
                </div>
                <div class="col-lg-4 col-md-4">
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
                                            @foreach ($lesson->course->lessons as $key => $lesson)
                                            @if(isset($applicant) && $applicant->approve == 1)


                                            @php
                                                    $video = \App\Video::where('lesson_id',$lesson->id)->where('group_id',$applicant->group_id)
                                                        ->first();
                                            @endphp


                                                <a href="{{route('lesson' , [$lesson->slug , $lesson->course->slug])}}"><li class="hide" >
                                                <div class="lectures_lists_title"><i class="ti-control-play"></i>{{ __('Lecture') }}: {{ $key + 1 }}
                                                        </div>{{  $lesson->getTranslatedAttribute('title') }}
                                                    </li>
                                                </a>
                                            @else
                                                    <a href="{{route('lesson' , [$lesson->slug , $lesson->course->slug])}}"><li class="hide" >
                                                <div class="lectures_lists_title"><i class="ti-control-play"></i>{{ __('Lecture') }}: {{ $key + 1 }}
                                                        </div>{{  $lesson->getTranslatedAttribute('title') }}
                                                    </li>
                                                </a>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->

@endsection
