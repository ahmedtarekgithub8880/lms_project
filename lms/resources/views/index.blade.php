<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@extends('layouts.app')

@section('content')
<div class=" m-auto" style="width: 90%; ">


    <div class="image-cover hero_banner hero-inner-2" style="background:white no-repeat;  filter: grayscale(10%);" data-overlay="0">
        <div class="container">
            <!-- Type -->
            <div class="row  g-2 align-items-center">
                <div class="col-lg-6 col-md-10 col-sm-12">
                    <div style="width: 85%">
                        <h1 style="color: black" class="cl_2 f_2 large_h " >up your<span style="color:#7F56D9;">skills</span>
                            to <span style="color:#7F56D9;">advance</span>  your
                               <span style="color:#7F56D9;">career</span> path</h1>

                        </h1>
                    </div>

                    <p style="color: black">

                        {{ app()->getLocale() == 'en' ? setting('banner.description_en')  : setting('banner.description_ar') }}.
                    </p>
                    <form method="get" action="{{ route('searchCourse') }}">
                    <div class="banner-search shadow_high mt-4">
                        <div class="search_hero_wrapping">

                            <div class="row">
                                <div class="col-lg-9 col-md-10 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input name="search" type="text" class="form-control" placeholder="{{ __('Keyword') }}">
                                            <img src="{{ asset('assets/img/search.svg') }}" style=" object-fit: contain;" class="search-icon" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div style="    height: 50px;" class="col-lg-3 col-md-2 col-sm-12 pl-0">
                                    <div  class="form-group none">
                                        <button  style="background-color: #7F56D9;  height: 100%;  " type="submit" class="btn search-btn full-width ">{{ __('Get start') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-10 col-sm-12 text-bg-primary ">
                    <img class="w-100 h-100"   src="https://3.bp.blogspot.com/-pN9Ap8855jA/W1fVtBAI-BI/AAAAAAAAAY8/FuSubIR3iK4SWXCS08IRMjizh783EUMdgCLcBGAs/w1152/Personal-computer.jpg" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="pb-5">
        <div class="text-center pt-5">
            <p style="color: #7F56D9">Our Services</p>
            <h2 >Here begins your journey from science to <br> work</h2>

        </div>
        <div class="row pt-5 g-10 container m-auto udate_about ">
            <div class=" udate_about_prt1 col-lg-4 col-md-4 col-sm-12">
                <img src="{{ asset('assets/learn website/Vector (1).png') }}" class="  bi-1-circle">
                <h5> Discover</h5>
                <p> A large variety of the most efficient and quality courses and specializations. </p>
            </div>
            <div class=" udate_about_prt2 col-lg-4 col-md-4 col-sm-12">
                <img src="{{ asset('assets/learn website/Group 14716.png') }}" class=" bi-1-circle">
                <h5 class="pt-3"> Learn</h5>
                <p> With the most qualified trainers to hone your professional and practical skills. </p>
            </div>
            <div class=" udate_about_prt3 col-lg-4 col-md-4 col-sm-12">
                <img src="{{ asset('assets/learn website/Vector (2).png') }}" class=" bi-1-circle">
                <h5> Get Certified</h5>
                <p> To enhance your chances of launching or developing your career. </p>
            </div>


        </div>

    </div>




    <div class=" m-2 m-auto ">
        <div class="text-center pt-5">
            <p style="color: #7F56D9">Our Coursess</p>
            <h2 >Here begins your journey from science to <br> work</h2>

        </div>
        <div class="courses" >
            <h3>
            <a href=" courses"> {{__('courses')}}</a>
            </h3>
            </h3>
            <ul class="border-bottom  list-ul">


                <li class="text-nowrap list-li add_color add"     value=" don "  id="all"   > {{__('All')}}</li>
                @foreach ($categories as $cate )

                <li class="text-nowrap list-li "  data-filter="{{".".$cate->name}}" name="{{ $cate->id}}" id="filter"     >{{ $cate->name }} </li>


             @endforeach

            </ul>
        </div>

        <div  style="" class= "active   all-slide">
            <div class="body">
                <div class="swiper mySwiper ">
                    <div id="courses" class="swiper-wrapper   ">
                        @foreach ($courses as $course )
                        <div class="swiper-slide  ght">
                            <div class=" cardd  {{ $course->category->name }} ">
                                <div   class=" item style_cured   mb-5  " >
                                    <div class="items-curd " >
                                        <a href="{{ route('course_details', $course->slug) }}">

                                            <img width="100%" height="250px"  src="{{ Storage::disk('public')->url($course->image) }}"  alt="">

                                        </a>
                                    </div>
                                    <div class="items-dec">
                                        <span  style="color: #7F56D9;"  >
                                            Design
                                        </span>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h4  value=' ' class="   items_dec_h4 d-inline-block text-truncate" style="max-width: 220px;">{{ $course->description }}</h4>
                                            </div>
                                            <div style=" display: flex; width: 30px; height: 30px; justify-content: end; " class="col-md-2">
                                                <img src="{{ asset('assets/learn website/Frame-1.png') }}" alt="">
                                            </div>
                                        </div>



                                        <span >
                                            <span style="color: #7F56D9" >9.4</span>
                                            <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                                            <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                                            <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                                            <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                                            <i class="bi pl-1 bi-star"></i>
                                            <span class="pl-2">({{ $course->lessons->count() }})</span>
                                        </span>

                                        <div class="row">
                                            @if ($course->trainer)


                                            <div class="   align-items-center  d-flex col-md-6">
                                                @if ($course->trainer->image)
                                                    <img style="width: 40px;      height: 40px; "  class="rounded-circle  "  src="https://thedatacademy.com/public/img/{{ $course->trainer->image }}" alt="">
                                                @else

                                                <img style="width: 40px;      height: 40px; " class="rounded-circle  " src="{{ asset('assets/learn website/Ellipse 170.png') }}" alt="">
                                                @endif
                                                <div class="pl-2 text- ">
                                                    <h4 class="p-0 m-0  text-truncate" style="max-width: 200px;" text-size-sm">{{ $course->trainer->name }} </h4>
                                                    @if ($course->trainer->experience > 0 )
                                                    <span class="p-0  text-size-sm m-0">{{ $course->trainer->experience ."" }}  Years </span>

                                                    @else

                                                    <span class="p-0  text-size-sm m-0">{{0 }}  Years </span>

                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-3  d-flex align-items-center  justify-content-center">
                                                <span style="color: #7F56D9; font-size:20px;"  >
                                                    {{ $course->price."00"."EG" }}
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                        @if ( $course->category)
                                            <h5 class="cate_name">{{ $course->category->name }} </h5>
                                        @endif
                                    </div>

                                    <div style="background-color: #7F56D9" class=" rounded pt-2 mb-3 d-flex align-items-center  w-75 m-auto justify-content-around " >
                                        <a href="@if (!isset(auth()->user()->id)) {{ url('login') }} @elseif($course->price == 0){{ route('join', $course_details->slug) }} @else {{ route('payment', $course->slug) }} @endif">
                                            <div class="  d-flex">
                                                <i style="font-size: 20px; color: #F0EAF8;" class="bi pb-1 pr-1 bi-cart-dash-fill"></i>
                                                <div style="font-size: 14px; color:#F0EAF8; ">
                                                    Add To cart
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <section class="mobile-head">
        <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="list_facts_wrap_img">
                        <img  style="   " src="{{ asset('assets/learn website/Group 14707.png') }}"     width="80%" height="500px"/>
                            <!-- <iframe src="{{setting('about.video')}}" width="100%" height="400px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="about-short">
                            <h3>
                                <div id="tw-target-text-container" class="tw-ta-container F0azHf tw-nfl" tabindex="0">
                                    <p id="tw-target-text" class="tw-data-text tw-text-large tw-ta" dir="ltr" style="text-align: left;" data-placeholder="Translation">
                                        <span class="Y2IQFc" lang="en">
                                            <span class="Y2IQFc" lang="en">

                                                {!! app()->getLocale() == 'en' ? setting('about.description_en') : setting('about.description_ar') !!}

                                            </span>
                                        </span>
                                    </p>
                                </div>
                            </h3>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure ea nihil, aspernatur iusto provident exercitationem molestias facilis, aperiam nam totam eos in dolores fuga blanditiis voluptatem voluptas soluta dicta! Veritatis!
                            </p>
                            <div class="cource_facts">
                                <ul>
                                    <li><span class="theme-cl">{{$count_courses}}</span> <h5>{{ __('Active Courses') }}</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt quo voluptate expedita maiores ducimus, minima iste vero molestias in? Odit odio ducimus alias similique facere harum tempore totam at voluptate! </p>
                                    </li>
                                    <li><span class="theme-cl">{{$count_users}}</span><h5>{{ __('Student Learning') }}</h5>
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi, atque dolores, dolorem, debitis asperiores tempora temporibus cupiditate ea vitae ipsam consectetur voluptatibus aperiam nostrum? Facere natus alias corrupti fugiat. Provident. </p>
                                    </li>
                                    <!-- <li><span class="theme-cl">84+</span>Free Cources</li> -->
                                </ul>
                            </div>


                        </div>
                    </div>


                </div>


            </div>
            </div>
    </section>


    <div class=" m-2 m-auto  ">
        <div class="text-center pt-5">
            <p style="color: #7F56D9">Our Shop</p>
            <h2 >Here begins your journey from science to <br> work</h2>

        </div>
        <div class="courses" >
            <h3>
            <a href=" courses"> {{__('shop')}}</a>
            </h3>
            </h3>
            <ul   class="border-bottom  list-ul">

                <li class="text-nowrap list-li add_color add"    id="all_shop"   > {{__('All')}}</li>
                @foreach ($p_categories as $p_cate )
                <li class="text-nowrap list-li "  name="{{ $p_cate->id}}" id="filter_shop"    >{{ $p_cate->name }} </li>

             @endforeach

            </ul>
        </div>

        <div  style="" class= "active   all-slide">
            <div class="body">
                <div  class="swiper mySwiper">
                    <div  id="shop" class="swiper-wrapper">
                      @forelse ($products as $product )
                        <div   class="swiper-slide ">
                          <div class=" item  mx-5  " >
                              <div class="items-curd" >
                                  <img src="{{ asset('assets/learn website/Rectangle 1449.png') }}" alt="">
                              </div>
                              <div class="items-dec">
                                  <span   style="color: #C11574; border:solid #C11574 1px;" >
                                      Research
                                  </span>
                                  <div class="row">
                                      <div class="col-md-10">
                                          <h4 class="  items_dec_h4 d-inline-block text-truncate" style="max-width: 220px;">
                                             {!!$product->title!!}
                                          </h4>
                                      </div>
                                      <div class="col-md-2">
                                          <img src="{{ asset('assets/learn website/Frame-1.png') }}" alt="">
                                      </div>
                                  </div>

                                  <p>{!!$product->description!!}</p>


                                  <div class="row">
                                      <div class="   align-items-center  d-flex col-md-8">
                                          <span class="d-flex" >
                                              <span style="color: #7F56D9" >9.4</span>
                                              <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                                              <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                                              <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                                              <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                                              <i class="bi pl-1 bi-star"></i>

                                          </span>
                                      </div>

                                      <div class="col-md-4  py-2 d-flex align-items-center  justify-content-center">
                                          <span style="color: #7F56D9; font-size:20px;"  >
                                              ${{ $product->price }}
                                          </span>
                                      </div>
                                  </div>
                                  <h5 > {{ $product->category->name  }}</h5>
                              </div>
                              <div style="background-color: #7F56D9" class=" rounded pt-2 mb-3 d-flex align-items-center  w-75 m-auto justify-content-around " >
                                  <div class="  d-flex">
                                      <i style="font-size: 20px; color: #F0EAF8;" class="bi pb-1 pr-1 bi-cart-dash-fill"></i>
                                      <div style="font-size: 14px; color:#F0EAF8; ">Add to Cart</div>
                                  </div>
                              </div>
                          </div>

                      </div>
                      @empty

                      @endforelse




                    </div>

            </div>
        </div>

        {{-- up date --}}





    </div>


    <section class="mt-5 trips_top">
        <div class="container">
            <div class="text-center pt-5">
                <p style="color: #7F56D9">Explore Services</p>
                <h2 >Here begins your journey from science to <br> work</h2>

            </div>
            <div class=" d-flex pt-5  w-50 m-auto justify-content-center">
                <img src="{{ asset('assets/learn website/image 116.png') }}" alt="">
                <span style="font-size: 20px; color:#7F56D9"> Data Academy</span>
            </div>
            <div class="row  pt-5">





                <!-- Cource Grid 1 -->



                <div class="col-lg-4 p-3 col-md-4 col-sm-12">
                    <div class="_wrk_prc_wrap p-3">
                        <div class="_wrk_prc_caption">
                            <h3 class="pb-3">{{ __('Vision') }}</h3>
                            <p style="font-size: 18px">
                                {{ app()->getLocale() =='en' ? setting('about.vision_en') : setting('about.vision_ar') }}
                            </p>
                        </div>

                    </div>
                </div>
                <!-- Cource Grid 1 -->
                <div class="col-lg-4 p-3 col-md-4 col-sm-12">
                    <div class="_wrk_prc_wrap p-3">

                        <div class="_wrk_prc_caption">
                            <h4 class="pb-3">{{ __('Mission') }}</h4>
                            <p style="font-size: 18px">
                                {{ app()->getLocale() =='en' ? setting('about.mission_en') : setting('about.mission_ar') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 p-3 col-md-4 col-sm-12" >
                    <div class="_wrk_prc_wrap p-3">

                        <div class="_wrk_prc_caption">
                            <h4 class="pb-3">{{ __('Core Values') }}</h4>
                            <p style="font-size: 18px">
                                {{ app()->getLocale() =='en' ? setting('about.core_values_en') : setting('about.core_values_ar') }}
                            </p>
                        </div>
                    </div>
                </div>



        </div>
    </section>




    <div class=" m-2 m-auto ">
        <div class="text-center pt-5">
            <p style="color: #7F56D9">Our Artical</p>
            <h2 >Here begins your journey from science to <br> work</h2>

        </div>
        <div class="courses" >
            <h3>
            <a href=" courses"> {{__('Artical')}}</a>
            </h3>
            </h3>

        </div>

        <div  style="" class= "active   all-slide">
            <div class="body">
                <div class="swiper mySwiper ">
                    <div id="courses" class="swiper-wrapper   ">
                        @foreach ($news  as $new )
                        <div class="swiper-slide  ght">
                            <div class=" cardd  = ">
                                <div    class=" item style_cured   mb-5  " >
                                    <div   class="items-curd " >
                                        <a href="{{ route('course_details', $new->slug) }}">

                                            <img width="100%" height="250px"  src="{{ Storage::disk('public')->url($new->image) }}"  alt="">

                                        </a>
                                    </div>
                                    <div  class="items-dec">
                                        <span  style="color: #7F56D9;"  >
                                            Design
                                        </span>
                                        <div class="row">
                                            <div class="col-6">
                                                <h4   class="   items_dec_h4 d-inline-block text-truncate" style="max-width: 220px;">{{ $new->title}}</h4>
                                            </div>
                                            <div style=" display: flex; width: 30px; height: 30px; justify-content: end; " class="col-3">
                                                <img src="{{ asset('assets/learn website/Frame-1.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div style="font-size: 11px ; with:100%;" >
                                           Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error doloribus dolores quidem! Doloribus inventore molestias eveniet asperiores et dolores est ipsa deleniti, quaerat quis assumenda, libero, repellat obcaecati ut architecto!
                                        </div>


                                        <div  class=" row pt-2">
                                            <i  style="color:#7F56D9" class="bi bi-calendar3 col-4"></i>
                                            <a  class="col-5" href="{{ route('single-news' , $new->slug) }}">
                                            <div style="font-size: 16px;  text-align: end; color:#7F56D9" >
                                                {{ __ ('See More') }}
                                                <i class="bi bi-arrow-right"></i>
                                            </div>
                                            </a>
                                        </div>


                                    </div>

                                 </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          centeredSlides: true,
          spaceBetween: 30,
          grabCursor: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
          }




        });
    </script>








</div>
</div>



@endsection
