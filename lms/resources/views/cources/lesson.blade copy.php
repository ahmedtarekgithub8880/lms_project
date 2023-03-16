@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Lesson</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost">
						@if(!$video->isEmpty())
							@php
								for($x=0 ; $x < $video->count() ; $x++ ){
									$video=$video[$x]
							@endphp

					<p>
			 
					<iframe src="{{$video->link}}" title="description"></iframe> 
									<!-- <video oncontextmenu="return false;"  class="img-fluid lesson_video" controls controlsList="nodownload  fullscreen noremoteplayback">
										<source src="$video->link" type="video/mp4">
									</video> -->

			
					 </p>
					 @php
							}
					@endphp

					@else
						<h2> There's No Video </h2>
					@endif

						<h1> {{$lessons[0]['title']}} </h1>
 						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								<p>{!! $lessons[0]['description'] !!} </p>
							</div>

						 </div>
 						@if($previous  != NULL)
							<button class="btn_1" style="margin-right: 58%;"><a type="button" href="{{route('lesson',[$previous_slug[0]['slug'],$course->slug])}}"  style="color: white;">previous lesson</a></button>
						@endif

						@if($next != NULL)
							<button  class="btn_1"><a type="button" href=" {{route('lesson',[$next_slug[0]['slug'],$course->slug])}}  "  style="color: white;">next lesson</a></button>
						@endif
						<!-- /post -->
								<hr>
						<div id="accordion_lessons" role="tablist" class="add_bottom_45">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="indicator ti-minus"></i> Lessons</a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion_lessons">
                                        <div class="card-body">
                                            <div class="list_lessons">
                                                <ul>
                                                    @foreach($count as $lesson)
                                                        <li><a href="{{ route('lesson',[$lesson->slug,$course->slug]) }}" >{{$lesson->title}}</a><span>{{   $lesson->lesson_duration  }}</span></li>
{{--                                                    <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li>--}}

                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /card -->

                                <!-- /card -->
                            </div>
							



					</div>
					<!-- /single-post -->

					
								
				</div>
				<!-- /col -->
 				<aside class="col-lg-3">
					 <div class="widget">
				 <div class="widget-title">
					<h4>Resources</h4>
				</div>
					@if(!$resources->isEmpty())
					<ul class="cats">
						@foreach($resources as $resource)
							@foreach(json_decode( $resource['link'] ) as  $vid )
								<li><a href="{{  Storage::disk('public')->url($vid->download_link)  }}" target="_blank"><i class="fa fa-chevron-right"></i> {{   \Illuminate\Support\Str::limit($resource->title , 20, '...')  }}</a></li>
							@endforeach
						@endforeach
					</ul>
					
					@else
							No resources		
					@endif
					</div>
                    @include('includes.right-section')
                </aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	
	@endsection