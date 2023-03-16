
@extends('layouts.app')
<link href="{{URL::asset('css\blog.css')}}" rel="stylesheet">

@section('content')



    <main>
        <section id="hero_in" class="general">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>{{$news->title}}</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bloglist singlepost">
                        <p><img alt="{{$news->title}}" class="img-fluid" src="{{ Storage::disk('public')->url($news->image) }}"></p>
                        <h1>{{$news->title}}</h1>
                        <div class="postmeta">
                        </div>
                        <!-- /post meta -->
                        <div class="post-content">

                            <p>  {!! $news->description !!}</p>

                        </div>
                        <!-- /post -->
                    </div>
                    <!-- /single-post -->

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


@endsection
