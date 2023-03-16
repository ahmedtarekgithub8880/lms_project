@extends('layouts.app')

@section('page_title' , __('Services'))
@section('page_info' , __('Services'))
@section('content')

    <!-- ============================ Page Title Start================================== -->
    @include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ========================== Articles Section =============================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">
            @forelse( $services as $service)
                <!-- Single Article -->
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="articles_grid_style">
                            <div class="articles_grid_thumb">
                                <a href="{{ route('single_service' , $service->slug) }}"><img
                                        src="{{ Storage::disk('public')->url($service->image) }}" style=" width:100%;max-height:200px; object-fit: contain;" class="img-fluid"
                                        alt="{{$service->getTranslatedAttribute('title')}}"/></a>
                            </div>

                            <div class="articles_grid_caption">
                                <h4>{{$service->getTranslatedAttribute('title')}}</h4>
                                <div class="articles_grid_author">

                                    <h4><a  class="btn btn-primary" href="{{ route('single_service' , $service->slug) }}">{{ __('See More') }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty

                    {{ __('No Services Found') }}

                @endforelse

            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
{{--                            {{ $service->links() }}--}}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Row -->

        </div>
    </section>
    <!-- ========================== Articles Section =============================== -->

@endsection
