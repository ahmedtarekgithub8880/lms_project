@extends('layouts.app')
@section('page_title' , $ourService->getTranslatedAttribute('title'))
@section('page_info' , __('Service'))
@section('content')


    <!-- ============================ Page Title Start================================== -->
    @include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section class="gray">

        <div class="container">

            <!-- row Start -->
            <div class="row">

                <!-- Blog Detail -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="article_detail_wrapss single_article_wrap format-standard">
                        <div class="article_body_wrap">

                            <div class="article_featured_image">
                                <img class="img-fluid" src="{{ Storage::disk('public')->url($ourService->image) }}" alt="">
                            </div>

                            <h2 class="post-title">{{ $ourService->getTranslatedAttribute('title') }}</h2>
                            {!! $ourService->getTranslatedAttribute('content') !!}

                        </div>
                    </div>

                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">

                    <!-- Searchbard -->
                    <div class="single_widgets widget_search">
                        <h4 class="title">{{ __('Search') }}</h4>
                        <form method="get" action="{{ route('services') }}" class="sidebar-search-form">
                            <input type="search" name="search" placeholder="{{ __('Search') }}..">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>


                    <!-- Trending Posts -->
                    <div class="single_widgets widget_thumb_post">
                        <h4 class="title">{{ __('Best services') }}</h4>
                        <ul>
                            @forelse($services as $data)
                                <li>
										<span class="left">
                                            <a href="{{ route('single_service' , $data->slug) }}">
								    			<img src="{{ Storage::disk('public')->url($data->image) }}" alt=""
                                                     class="">
                                            </a>
										</span>
                                    <span class="right">
											<a class="feed-title"
                                               href="{{ route('single_service' , $data->slug) }}">{{ $data->getTranslatedAttribute('title') }}</a>
                                        <a style="padding: 10px; margin: 10px;"  class="btn btn-primary" href="{{ route('single_service' , $data->slug) }}">{{ __('See More') }}</a>
										</span>
                                </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>

                </div>

            </div>
            <!-- /row -->

        </div>

    </section>

    <!-- ============================ Agency List End ================================== -->


@endsection
