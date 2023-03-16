@extends('layouts.app')
@section('page_title' , __('Terms & Conditions'))
@section('page_info' , __('terms & conditions'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- =================================== FAQS =================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">


                    <div class="tab-content tabs_content_creative" id="myTabContent">
    
{!!  app()->getLocale() == 'en' ? setting('terms.terms') : setting('terms.terms_ar') !!}

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ====================================== FAQS =================================== -->

@endsection
