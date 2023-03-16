@extends('layouts.app')

@section('content')
    <!-- ============================ Page Title Start================================== -->







    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">


                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <!-- <ul class="cources_facts_list">
                            <li class="facts-1">SEO</li>
                            <li class="facts-5">Design</li>
                        </ul> -->
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{__("Your Quiz Degree's  is")}} "{{$result}}"</h2>
                             
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    

@endsection
