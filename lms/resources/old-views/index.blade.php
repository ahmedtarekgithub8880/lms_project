

@extends('layouts.app')

@section('content')

    <main>
        <section class="slider">
            <div id="slider" class="flexslider">
                <ul class="slides">

                    @foreach($Sliders as $ll_Sliders)


                    <li>
                        <img src="{{ Storage::disk('public')->url($ll_Sliders->image) }}" alt="{{$ll_Sliders->title}}">
                        <div class="meta">
                            <h3>{{$ll_Sliders->title}}</h3>
                            <div class="info">
                                <p>{{$ll_Sliders->title2}}</p>
                            </div>
                            <a href="{{$ll_Sliders->link}}" class="btn_1">Read more</a>
                        </div>
                    </li>

                    @endforeach

                </ul>
                <div id="icon_drag_mobile"></div>
            </div>
            <div id="carousel_slider_wp">
                <div id="carousel_slider" class="flexslider">
                    <ul class="slides">

                        @foreach($Sliders as $ll_Sliders)

                        <li>
                            <img src="{{ Storage::disk('public')->url($ll_Sliders->image) }}" alt="{{$ll_Sliders->title}}" style="height: 153px;">
                            <div class="caption">
                                <h3>{{$ll_Sliders->title}}</h3>
                            </div>
                        </li>

                         @endforeach

                    </ul>
                </div>
            </div>
        </section>
        <!-- /slider -->

        <div class="container-fluid margin_120_0">
            <div class="main_title_2">
                <span><em></em></span>
                <h2> Popular Courses</h2>
{{--                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>--}}
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">

                @foreach($all_cources as $single_cource )


                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="{{route('course_details',$single_cource->slug)}}">
                                <div class="preview"><span>Preview course</span></div>

                                <img src="{{ Storage::disk('public')->url($single_cource->image)}}" alt="{{$single_cource->title}}"class="img-fluid"></a>
                            <div class="price">{{ $single_cource->price == 0 ? "Free" : $single_cource->price }} LE</div>

                        </figure>
                        <div class="wrapper">

                            <?php $category =\TCG\Voyager\Models\Category::where('id',$single_cource->category_id)->get();?>
                            <small>  Category : <a href="{{ route('cat_cources', $category[0]['slug']) }}"> {{\Illuminate\Support\Str::limit($category[0]['name'], 12, '...')}} </a></small>
                            <h3>{{$single_cource->title}}</h3>
                            <p>{{\Illuminate\Support\Str::limit(strip_tags($single_cource->description), 100, '...')}}</p>
{{--                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>--}}
                        </div>
                        <ul>
                            <li><i class="icon-book"></i>  {{\App\Lesson::where('course_id',$single_cource->id)->count() }}  Lessons</li>
                            <li><a href="{{route('course_details',$single_cource->slug)}}">Enroll now</a></li>
                        </ul>
                    </div>
                </div>



                @endforeach

            </div>
            <!-- /carousel -->
            <div class="container">
                <p class="btn_home_align"><a href="{{route('cources')}}" class="btn_1 rounded">View all courses</a></p>
            </div>
            <!-- /container -->
            <hr>
        </div>
        <!-- /container -->

        <div class="container margin_30_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Our Categories </h2>
{{--                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>--}}
            </div>
            <div class="row">
                @foreach($Categories as $all_Categories)

                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="{{ route('cat_cources' ,[$all_Categories->slug]) }}" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ Storage::disk('public')->url($all_Categories->image) }}" alt="{{$all_Categories->name}}" style="width: 100%;" class="img-fluid" >
                            <div class="info">
                                <small><i class="ti-layers"></i>{{\App\Course::where('category_id',$all_Categories->id)->count() }}  Courses</small>
                                <h3>{{$all_Categories->name}}</h3>
                            </div>
                        </figure>
                    </a>
                </div>


                @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="bg_color_1">
            <div class="container margin_120_95">
                <div class="main_title_2">
                    <span><em></em></span>
                    <h2>News and Events</h2>
{{--                    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>--}}
                </div>
                <div class="row">
                    @foreach($all_news as $all_news_data )
                    <div class="col-lg-6">
                        <a class="box_news" href="{{ route('single-news', $all_news_data->slug) }}">
                            <figure><img src="{{ Storage::disk('public')->url($all_news_data->image)}}" alt="{{$all_news_data->title}}">
{{--                                <figcaption><strong>28</strong>Dec</figcaption>--}}
                            </figure>
                            <ul>
{{--                                <li>Mark Twain</li>--}}
{{--                                <li>20.11.2017</li>--}}
                            </ul>
                            <h4>{{$all_news_data->title}}</h4>
                            <p  >{{Str::limit(strip_tags($all_news_data->description), 120, '...')}} </p>
                        </a>
                    </div>

                    @endforeach

                </div>
                <!-- /row -->
                <p class="btn_home_align"><a href="{{route('news')}}" class="btn_1 rounded">View all news</a></p>
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->

        <div class="call_section">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3>{{$page[0]['title']}}</h3>

                            <p>{{$page[0]['excerpt']}}</p>
                            <a href="{{url('pages/'.$page[0]['slug'])}}" class="btn_1 rounded">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>

@endsection
