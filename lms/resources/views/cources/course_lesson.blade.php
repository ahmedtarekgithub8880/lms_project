@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')
<!--Single content start-->
<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Lesson</h1>
				</div>
			</div>
		</section>
<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="ed_course_single_item">
				<div class="ed_course_single_image">
				@if(!$video->isEmpty())
							<?php
								for($x=0 ; $x < $video->count() ; $x++ ){
							?>

					<div class="ed_video_section">
						<div class="embed-responsive embed-responsive-16by9">
							<div class="ed_video">
								<img src="images/content/Single_course_bg.jpg" class="img-responsive" alt="1" />
								<div class="ed_img_overlay">
									<a href="#"><i class="fa fa-chevron-right"></i></a>
								</div>
							</div>

                             @foreach(json_decode( $video[$x]['link'] ) as  $vid )
                            	<video oncontextmenu="return false;" width="320" height="240" controls controlsList="nodownload  fullscreen noremoteplayback">
                                	<source src="{{ Storage::disk('public')->url($vid->download_link) }}" type="video/mp4">
							  	</video>

							 @endforeach
						 </div>
						 <br>
					</div>
					<br>

					<?php
							}
					?>

				@else
					<h2> There's No Video </h2>
				@endif

				</div>
			<div class="ed_course_single_info" id="les">
				<h2 class="ed_toppadder20">Lesson : {{$lessons[0]['title']}}</h2>

				<p>{!! $lessons[0]['description'] !!}</p>

				@if( $lessons[0]['id']-1 != NULL)
				<a type="button" href="{{route('lesson',[$lessons[0]['id']-1,$id])}}" class="btn ed_btn pull-left ed_orange">preview lesson</a>
				@endif


				@if($lessons[0]['id']+1 <= $count->count())
				<a type="button" href=" {{route('lesson',[$lessons[0]['id']+1,$id])}} "  class="btn ed_btn pull-right ed_orange">next lesson</a>
				@endif
			</div>
			</div>
			<div class="ed_time_executor ed_toppadder40">
				<ul>
					<li><a href="course_lesson.html">lessons</a> <span>estimated time</span></li>
					@foreach($count as $lesson)
					<li><a href="{{ route('lesson',[$lesson->id,$id]) }}">{{$lesson->title}}</a> <span>{{$lesson->duration}}</span></li>
					@endforeach
				</ul>
			</div>
			</div>

<!--Sidebar Start-->
 <aside class="col-lg-3">
                    @include('includes.right-section')
                </aside>
 <!--Sidebar End-->

	</div>
  </div>

</div>

<!--Single content end-->
<!--Newsletter Section six start-->
 <!--Newsletter Section six end-->


@endsection
