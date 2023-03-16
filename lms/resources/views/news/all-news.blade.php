@extends('layouts.app')
@section('page_title' , __('NEWS & Articles'))
@section('page_info' , __('news'))
@section('content')

    	<!-- ============================ Page Title Start================================== -->
@include('includes.breadcrumb')
			<!-- ============================ Page Title End ================================== -->

			<!-- ========================== Articles Section =============================== -->
			<section class="pt-0">
				<div class="container">

					<div class="row">
                    @forelse( $news as $single_news)
						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="{{ route('single-news' , $single_news->slug) }}"><img src="{{ Storage::disk('public')->url($single_news->image) }}" style="height:300px;" class="img-fluid" alt="{{$single_news->title}}" /></a>
								</div>

								<div class="articles_grid_caption">
									<h4>{{$single_news->getTranslatedAttribute('title')}}</h4>
									<div class="articles_grid_author">

							    	<a  href="{{ route('single-news' , $single_news->slug) }}">{{ __ ('See More') }}</a>
									</div>
								</div>
							</div>
						</div>

					@empty

                        {{ __('No News Found') }}

                    @endforelse

					</div>

					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">

							<!-- Pagination -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            {{ $news->links() }}
								</div>
							</div>

						</div>
					</div>
					<!-- /Row -->

				</div>
			</section>
			<!-- ========================== Articles Section =============================== -->


@endsection
