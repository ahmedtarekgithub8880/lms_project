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

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    
                    
                        
                        <br/>
                    
                    
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 style="text-align:center"> {{__('Courses')}}</h1>
                            <br>
                         </div>
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


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 style="text-align:center"> {{__('Services')}}</h1>
                            <br>
                         </div>
            @forelse( $all_services as $service)
                <!-- Single Article -->
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="articles_grid_style">
                            <div class="articles_grid_thumb">
                                <a href="{{ route('single_service' , $service->slug) }}"><img
                                        src="{{ Storage::disk('public')->url($service->image) }}" style=" width:100%;max-height:200px; object-fit: contain;" class="img-fluid"
                                        alt="{{$service->getTranslatedAttribute('title')}}"/></a>
                            </div>

                            <div class="articles_grid_caption">
                                <h4>{{$service->getTranslatedAttribute('title')}}</h4>
                                <div class="articles_grid_author">

                                    <h4><a  class="btn btn-primary" href="{{ route('single_service' , $service->slug) }}">{{ __('See More') }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty

                    {{ __('No Services Found') }}

                @endforelse

            </div>
       


                    </div>
                </div>

            </div>
            <!-- Row -->

        </div>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 style="text-align:center"> {{__('Products')}}</h1>
                            <br>
                         </div>



                    <!-- Single Product -->
                    
                @forelse($all_products as $product)
                <div class="col-lg-4 col-md-10 col-sm-12">
                        <div class="shop_grid">
                            <div class="shop_status hot">{{ $product->category->getTranslatedAttribute('name') }}</div>
                            <div class="shop_grid_thumb">
                                <a href="{{ route('singleProduct' ,$product->slug) }}"><img src="{{ Storage::disk('public')->url($product->image) }}"class="img-fluid" alt=""/></a>
                            </div>
                            <div class="shop_grid_caption">
                                <h4 class="sg_rate_title"><a href="{{ route('singleProduct' ,$product->slug) }}">{{ $product->getTranslatedAttribute('name') }}</a></h4>
                                <span class="sg_rate theme-cl" style="@if(app()->getLocale() =='ar') direction:rtl; @else direction:ltr; @endif">{{ $product->price }} {{ __('OMR') }}</span>
                            </div>
                            <div class="shop_grid_action">
                                <a href="{{ route('singleProduct' ,$product->slug) }}" class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                                title="{{ __('View') }}"><i class="ti-link"></i></a>

                                <a href="{{ route('addOneItemtoCart' , $product->id) }}" class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                                title="{{ __('Add To Cart') }}"><i class="ti-shopping-cart"></i></a>
                                <a href="javascript:void(0)"  onclick='event.preventDefault(); document.getElementById("wish{{ $product->id }}").submit();' class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                                title="{{ __('Add to wishlist') }}"><i class="ti-heart"></i></a>

                                <form id="wish{{ $product->id }}" action="{{ route('addToWishlist' , ['product_id' => $product->id]) }}" method="post"
                                    style="display: none;">
                                    @csrf

                                </form>


                                {{--                                    <a href="#" class="btn btn-shop" data-toggle="tooltip" data-placement="top" title="Compare"><i class="ti-reload"></i></a>--}}
                            </div>
                        </div>
                        </div>
                @empty
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <h3>{{ __('No products found') }}</h3>
                    </div>
                @endforelse
            

     

            

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
