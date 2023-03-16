@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>{{  $page[0]['title'] }}</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost">
						<p><img alt="" class="img-fluid page_img" src="{{ Storage::disk('public')->url($page[0]['image'])}}" alt="blog image"></p>
						<h1>{{  $page[0]['title'] }}</h1>
 						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								<p>{!! $page[0]['body'] !!} </p>
							</div>

 						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					
								

					<hr>

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
	<!--/main-->
	
	@endsection