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
                            <h2 class="ed_title">{{_('Upload Assignment')}}</h2>
                            <form action="{{route('store-resolves')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="assignment_id" value="{{$assignment_id}}" >
                                <input type="hidden" name="user_id" value="{{auth()->id()}}" >
                                <input type="file" name="file" id="fileToUpload">
                                <button type="submit" class="btn btn-primary" >{{__('upload')}}</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Page Title End ================================== -->

    

@endsection
