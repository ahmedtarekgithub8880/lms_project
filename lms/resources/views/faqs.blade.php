@extends('layouts.app')
@section('page_title' , __('You need help ?'))
@section('page_info' , __('F&Qs'))
@section('content')

@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- =================================== FAQS =================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">


                    <div class="tab-content tabs_content_creative" id="myTabContent">

                    @forelse( $faqs as $faq)
                        <!-- general Query -->
                            <div class="tab-pane fade  show active" id="general" role="tabpanel"
                                 aria-labelledby="general-tab">

                                <div class="accordion" id="generalac{{ $faq->id }}">
                                    <div class="card">
                                        <div class="card-header" id="headingOne{{ $faq->id }}">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#collapseOne{{ $faq->id }}" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    {{ $faq->getTranslatedAttribute('title') }}
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne{{ $faq->id }}" class="collapse  @if($loop->first)  show @endif" aria-labelledby="headingOne{{ $faq->id }}"
                                             data-parent="#generalac{{ $faq->id }}">
                                            <div class="card-body">
                                                <p class="ac-para">
                                                {!! $faq->getTranslatedAttribute('content') !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ====================================== FAQS =================================== -->

@endsection
