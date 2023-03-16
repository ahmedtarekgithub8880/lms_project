@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')







    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Our News</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">


                    @foreach( $news as $single_news)



                    <article class="blog wow fadeIn">
                        <div class="row no-gutters">
                            <div class="col-lg-7">
                                <figure>
                                    <a href="{{ route('single-news' , $single_news->slug) }}"><img src="{{ Storage::disk('public')->url($single_news->image) }}" alt="{{$single_news->title}}">
                                        <div class="preview"><span>Read more</span></div>
                                    </a>
                                </figure>
                            </div>
                            <div class="col-lg-5">
                                <div class="post_info">
                                    <h3><a href="{{ route('single-news' , $single_news->slug) }}">{{$single_news->title}}</a></h3>
                                    <p>  {!! Str::limit($single_news->description , 220 , '...') !!}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- /article -->
                    @endforeach

                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            {{ $news->links() }}
                        </ul>
                    </nav>
                    <!-- /pagination -->
                </div>
                <!-- /col -->

                <aside class="col-lg-3">
                    <div class="widget">



                @include('includes.right-section')

                </aside>
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
















@endsection
