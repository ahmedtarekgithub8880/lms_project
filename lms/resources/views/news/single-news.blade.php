@extends('layouts.app')
@section('page_title' , $news->getTranslatedAttribute('title'))
@section('page_info' , __('news'))
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
                                <img class="img-fluid" src="{{ Storage::disk('public')->url($news->image) }}" alt="">
                            </div>


                            <h2 class="post-title">{{ $news->getTranslatedAttribute('title') }}</h2>
                            {!! $news->getTranslatedAttribute('description') !!}

                        </div>
                    </div>


                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">

                    <!-- Searchbard -->
                    <div class="single_widgets widget_search">
                        <h4 class="title">{{ __('Search') }}</h4>
                        <form method="get" action="{{ route('news') }}" class="sidebar-search-form">
                            <input type="search" name="search" placeholder="{{ __('Search') }}..">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>


                    <!-- Trending Posts -->
                    <div class="single_widgets widget_thumb_post">
                        <h4 class="title">{{ __('Trending News') }}</h4>
                        <ul>
                            @forelse($latestNews as $news)
                                <li>
										<span class="left">
                                            <a href="{{ route('single-news' , $news->slug) }}">
								    			<img src="{{ Storage::disk('public')->url($news->image) }}" alt=""
                                                     class="">
                                            </a>
										</span>
                                    <span class="right">
											<a class="feed-title"
                                               href="{{ route('single-news' , $news->slug) }}">{{ $news->getTranslatedAttribute('title') }}</a>
											<span class="post-date"><i class="ti-calendar"></i>{{ $news->created_at->diffForHumans() }}</span>
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
