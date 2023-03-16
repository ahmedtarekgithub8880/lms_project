@extends('layouts.app')
@section('page_title' , __('rights guarantee'))
@section('page_info' , __('rights guarantee'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- =================================== FAQS =================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">


                    <div class="tab-content tabs_content_creative" id="myTabContent">
{!!  app()->getLocale() == 'en' ? setting('rights.rights') : setting('rights.rights_ar') !!}    

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ====================================== FAQS =================================== -->

@endsection
