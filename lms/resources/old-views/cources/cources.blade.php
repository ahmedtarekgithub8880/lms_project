<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@extends('layouts.app')

@section('content')

    <main>
        <section id="hero_in" class="courses">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span>Online courses</h1>
                </div>
            </div>
        </section>
        <!--/hero_in-->
        <div class="filters_listing sticky_horizontal" >
            <div class="container">
                <ul class="clearfix">

                    @if( !isset($category) )
                    <li >
                        <div class="switch-field">
                                <input  onclick="all_courses()" type="radio" id="all"  name="listing_filter" value="all" checked>
                                <label  for="all">All</label>
                                <input  onclick="paid()" type="radio" id="paid"  name="listing_filter" value="paid">
                                <label  for="paid">Paid</label>
                                <input  onclick="free()" type="radio" id="free" name="listing_filter" value="free">
                                <label  for="free">Free</label>

                        </div>
                    </li>
                @endif

                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /filters -->

        <div class="container margin_60_35  coursat" id="coursat" >


              @include('cources.ajax')


        </div>

        <!-- /container -->
        <div class="bg_color_1">
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#0" class="boxed_list">
                            <i class="pe-7s-help2"></i>
                            <h4>Need Help? Contact us</h4>
                            <p>Cum appareat maiestatis interpretaris et, et sit.</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#0" class="boxed_list">
                            <i class="pe-7s-wallet"></i>
                            <h4>Payments and Refunds</h4>
                            <p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#0" class="boxed_list">
                            <i class="pe-7s-note2"></i>
                            <h4>Quality Standards</h4>
                            <p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
                        </a>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
    </main>



@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                loadCourses(url);
            });

            function loadCourses(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('#coursat').html(data);
                }).fail(function () {
                    console.log("Failed to load data!");
                });
            }
        });

    </script>

    <script>

        function all_courses() {
            $.ajax({
                url:"{{ route('cources') }}",
                method:"GET",
                dataType: 'json',
                success:function(result)
                {
                    $('#coursat').html(result);
                }
            });
        }
    </script>



    <script>
        function paid() {
            $.ajax({
                url:"{{ route('paid_cources') }}",
                method:"GET",
                dataType   :'json',
                success:function(result)
                {
                    $('#coursat').html(result);
                }
            });
        }
    </script>

    <script>
        function free() {
            $.ajax({
                url:"{{ route('free_cources') }}",
                method:"GET",
                dataType   :'json',
                success:function(result)
                {
                    $('#coursat').html(result);
                }
            });
        }
    </script>

@endsection
