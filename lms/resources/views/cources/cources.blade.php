@extends('layouts.app')
@section('page_title', __('Courses'))
@section('page_info', __('Courses'))

@section('content')
    <!-- ============================ Page Title Start================================== -->
    @include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Full Width Courses  ================================== -->
    <section class="pt-0">
        <div class="container">



            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div id="filter-sidebar2" class="filter-sidebar">
                        <div class="filt-head">
                            <h4 class="filt-first">{{ __('Advance Search') }}</h4>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">{{ __('Close') }} <i
                                    class="ti-close"></i></a>
                        </div>

                        <form class="" action="{{ route('filterCourse') }}">
                            <div class="show-hide-sidebar">

                                <!-- Find New Property -->
                                <div class="sidebar-widgets">

                                    <!-- Search Form -->

                                    <input class="form-control" name="search" type="search"
                                           placeholder="{{ __('Search keyword') }} ..." aria-label="Search">

                                    <div class="clearfix"></div>
                                    <br>


                                    <h4 class="side_title">{{ __('Categories') }}</h4>
                                    <ul class="no-ul-list mb-3">
                                        @forelse($cats as $category)
                                            <li>
                                                <input id="a-{{ $category->id }}" class="checkbox-custom"
                                                       name="category_id[]" value="{{ $category->id }}"
                                                       type="checkbox">
                                                <label for="a-{{ $category->id }}"
                                                       class="checkbox-custom-label">{{ $category->name }}
                                                    {{-- ({{ $category->courses->count() }})</label> --}}
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
                        
                            {{ __('We found') }}   
                            - <strong>  {{ $all_cources->count() }}  </strong> - {{ __('courses for you') }}
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 ordering">
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
                        <br/>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 ordering p-2">
                            <div class="filter_wraps" >
                                <div class="dl" style="padding:0 10px ;">
                                    <div class="dropdown show">
                                        <a class="btn btn-theme dropdown-toggle  arrow-btn filter_open" href="#"
                                           role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            {{ __('Choose Category') }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            @foreach ($cats as $cat)
                                                <a class="dropdown-item"
                                                   href="{{ route('cources', $cat->slug) }}">{{ $cat->getTranslatedAttribute('name') }}</a>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <div class="dl">
                                    <div class="dropdown show">
                                        <a class="btn btn-theme dropdown-toggle  arrow-btn filter_open" href="#"
                                           role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">
                                            {{ __('Sort by price') }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <a class="dropdown-item" href="{{ URL::current().'?price=highest'  }}"> <i class="fa fa-arrow-up"></i> &nbsp; {{ __('Highest') }}</a>
                                            <a class="dropdown-item" href="{{ URL::current().'?price=lowest' }}"> <i class="fa fa-arrow-down"></i> &nbsp; {{ __('Lowest') }}</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!-- /Row -->

                        
                        <div class="row">
                            
                            @forelse ($all_cources as $course)

                                <div class="col-lg-4 col-md-10 col-sm-12">
                                    <div class="education_block_grid style_2">

                                        <div class="education_block_thumb n-shadow">
                                            <a href="{{ route('course_details', $course->slug) }}"><img
                                                    src="{{ Storage::disk('public')->url($course->image) }}"
                                                    class="img-fluid" style=" width:100%;max-height:250px; object-fit: contain;" alt=""></a>
                                        </div>

                                        <div class="education_block_body">
                                            <h4 class="bl-title"><a
                                                    href="{{ route('course_details', $course->slug) }}">
                                                    {{ $course->getTranslatedAttribute('title') }}

                                                </a></h4>
                                        </div>

                                        <div class="cources_facts">
                                            <ul class="cources_facts_list">
                                                <li class="facts-3">{{ __('Category') }}
                                                    : {{ $course->category ?$course->category->getTranslatedAttribute('name'): '' }}</li>

                                            </ul>
                                        </div>

                                        <div class="cources_info">
                                            <div class="cources_info_first">
                                                <ul>
                                                    <li>
                                                        <strong>{{ $course->lessons->count() ?? '' }} {{ __('Lessons') }}</strong>
                                                    </li>
                                                    @php $courseApplicantsCount =  \App\Applicant::where('course_id' , $course->id)->count();  @endphp
                                                    <li class="theme-cl">({{ $courseApplicantsCount ?? 0 }})
                                                        {{ __('Enrolment') }}</li>
                                                </ul>
                                            </div>
                                            <div class="cources_info_last">
                                                <h3>{{ $course->price }}  {{ __('OMR') }}  </h3>
                                            </div>
                                        </div>

                                        

                                    </div>
                                </div>
                        @empty
                        @endforelse
                        <!-- Cource Grid 1 -->

                        </div>


                    </div>
                </div>

            </div>
            <!-- Row -->

        </div>
    </section>

    <script>
        function openNav2() {
            document.getElementById("filter-sidebar2").style.width = "320px";
        }

        function closeNav2() {
            document.getElementById("filter-sidebar2").style.width = "0";
        }
    </script>
    <!-- ============================ Full Width Courses End ================================== -->
@endsection
