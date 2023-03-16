@extends('layouts.app')
@section('page_title' , __('Find your product'))
@section('page_info' , __('Shop'))
@section('content')

@include('includes.breadcrumb')

    <!-- ============================ Full Width Shop  ================================== -->
    <section class="pt-0">
        <div class="container">

            <!-- Onclick Sidebar -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div id="filter-sidebar2" class="filter-sidebar">
                        <div class="filt-head">
                            <h4 class="filt-first">{{ __('Advance Search') }}</h4>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">{{ __('Close') }} <i
                                    class="ti-close"></i></a>
                        </div>

                        <form class="" action="{{ route('filterShop') }}">
                            <div class="show-hide-sidebar">

                                <!-- Find New Property -->
                                <div class="sidebar-widgets">

                                    <!-- Search Form -->

                                    <input class="form-control" name="search" type="search"
                                           placeholder="{{ __('Search keyword') }} ..." aria-label="Search">

                                    <div class="clearfix"></div>
                                    <br>


                                    <h4 class="side_title">{{ __('Product categories') }}</h4>
                                    <ul class="no-ul-list mb-3">
                                        @forelse($p_categories as $category)
                                            <li>
                                                <input id="a-{{ $category->id }}" class="checkbox-custom"
                                                       name="p_category_id[]" value="{{ $category->id }}"
                                                       type="checkbox">
                                                <label for="a-{{ $category->id }}"
                                                       class="checkbox-custom-label">{{ $category->name }}
                                                    ({{ $category->products->count() }})</label>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    <br>

                                    <h4 class="side_title">{{ __('Price') }}</h4>
                                    <ul class="no-ul-list mb-3">
                                        <li>
                                            <label for="a-10" class="checkbox-custom-label">{{ __('From') }} </label>
                                            <input style="width: 100%; height: 50px" id="a-10" class="form-control"
                                                   name="min_price" placeholder="{{ __('Price start from') }} .." type="text">
                                        </li>
                                        <li>
                                            <label for="a-10" class="checkbox-custom-label">{{ __('To') }} </label>
                                            <input style="width: 100%; height: 50px" id="a-10" class="form-control"
                                                   name="max_price" placeholder="{{ __('Maximum price') }} .." type="text">
                                        </li>

                                    </ul>

                                    <button class="btn btn-theme full-width mb-2">{{ __('Filter Result') }}</button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Row -->
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            {{ __('We found') }} <strong>{{ $products->count() }}</strong> {{ __('result for you') }}
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                            <div class="filter_wraps">
                                <div class="dl">
                                    <div id="main2">
                                        <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open"
                                           onclick="openNav2()" id="open2">{{ __('Show Filter') }}<span><i
                                                    class="fas @if(app()->getLocale()== 'en' ) fa-arrow-alt-circle-right @else fa-arrow-alt-circle-left @endif" ></i></span></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Row -->

                    <div class="row">

                   @include('shop.product_card')

                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <!-- Pagination -->
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">--}}
                            {{--                                    <button type="button" class="btn btn-loader">Load More<i class="ti-reload ml-3"></i></button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                        </div>
                    </div>
                    <!-- /Row -->

                </div>

            </div>
            <!-- Row -->

        </div>
    </section>
    <!-- ============================ Full Width Courses End ================================== -->
    <script>
        function openNav2() {
            document.getElementById("filter-sidebar2").style.width = "320px";
        }

        function closeNav2() {
            document.getElementById("filter-sidebar2").style.width = "0";
        }
    </script>


@endsection
